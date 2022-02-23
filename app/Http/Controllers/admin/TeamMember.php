<?php

namespace App\Http\Controllers\admin;

use App\Api\ErpAPI;
use App\Http\Controllers\Controller;
use App\Api\SmartHRAPI;
use App\Api\TaskAPI;
use App\Api\TicketsAPI;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\DataTables;


class TeamMember extends Controller
{
    public function __construct()
    {
        $this->smarthr = new  SmartHRAPI();
    }
    public function index()
    {
        $smarthr = new  SmartHRAPI();
        $get = $_GET ? $_GET : [];
        $smarthr->getEmployees($get);

        return  view('admin/team_member/index');
    }
    public function add()
    {
        $smarthr = new  SmartHRAPI();
        $get = $_GET ? $_GET : [];
        $smarthr->getEmployees($get);

        return  view('admin/team_member/add');
    }
    public function getData()
    {
        $users = User::select(['id', 'name', 'email', 'hr_user_id', 'task_user_id','erp_user_id','ticket_user_id','role_id'])->where("id",">",1);

        return Datatables::of($users)
            ->addColumn('action', function ($row) {
                $edit_url = route("edit_member",  $row->id);
                $delete_url = route("delete_member", $row->id);
                $edit_lang = __('Edit');
                $delete_lang = __('Delete');
                $btn = '';
                $btn = $btn . '<a  href="' . $edit_url . '" title="' . $edit_lang . '" class="edit mt-1 btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                $btn = $btn . ' <a link="' . $delete_url . '" title="' . $delete_lang . '" class="edit mt-1 btn btn-danger delete-btn btn-sm"><i class="fa fa-trash"></i></a>';

                return $btn;
            })
            ->addColumn('hr', function ($row) {
                $linked='<i class="fa fa-check-circle text-success"></i> ';
                $unlinked='<i class="fa fa-times-circle text-danger"></i> ';
             if($row->hr_user_id>0)
                return $linked;
                else
                return $unlinked;

            })
            ->addColumn('task', function ($row) {
                $linked='<i class="fa fa-check-circle text-success"></i> ';
                $unlinked='<i class="fa fa-times-circle text-danger"></i> ';
                if($row->task_user_id>0)
                   return $linked;
                   else
                   return $unlinked;
               })
               ->addColumn('erp', function ($row) {
                $linked='<i class="fa fa-check-circle text-success"></i> ';
                $unlinked='<i class="fa fa-times-circle text-danger"></i> ';

                if($row->erp_user_id>0)
                   return $linked;
                   else
                   return $unlinked;
   
               })
               ->addColumn('ticket', function ($row) {
                $linked='<i class="fa fa-check-circle text-success"></i> ';
                $unlinked='<i class="fa fa-times-circle text-danger"></i> ';
                if($row->ticket_user_id>0)
                   return $linked;
                   else
                   return $unlinked;
   
               })
               ->addColumn('role', function ($row) {
                $admin=__('Admin');
                $user=__('Normal User');
                $admin='<i class="fa fa-check-circle text-success"></i> ';
                $user='<i class="fa fa-times-circle text-danger"></i> ';
                if($row->role_id==1)
                   return $admin;
                   else
                   return $user;
   
               })
            ->rawColumns(['action','hr','erp','task','ticket','role'])
    
            ->make(true);
    }
    public function getHREmployees()
    {

        $filter = $_GET ? $_GET : [];
        $users = User::where("hr_user_id", ">", 0)->get();

        if ($users) {
            $not_ids = [];
            foreach ($users as $u) {
                $not_ids[] = $u->hr_user_id;
            }
            if (!empty($not_ids)) {
                $filter['not_ids'] = implode(',', $not_ids);
            }
        }

        return   $this->smarthr->getEmployees($filter);
    }
    public function getManagersList()
    {

        $filter = $_GET ? $_GET : [];
        return   $this->smarthr->getEmployees($filter);
    }
    public function getBranches()
    {
        $filter = $_GET ? $_GET : [];
        return   $this->smarthr->getBranches($filter);
    }
    public function getDepartments()
    {
        $filter = $_GET ? $_GET : [];
        return   $this->smarthr->getDepartments($filter);
    }
    public function getWorkSchedules()
    {
        $filter = $_GET ? $_GET : [];
        return   $this->smarthr->getWorkSchedules($filter);
    }
    public function getcurrenciesList()
    {
        $filter = $_GET ? $_GET : [];
        return   $this->smarthr->getcurrenciesList($filter);
    }
    public function getHRUserRoles()
    {
        $filter = $_GET ? $_GET : [];
        return   $this->smarthr->getUserRoles($filter);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $get['id'] = intval($user->hr_user_id);
        $data['user'] = $user;
      /*  $data['hr_users'] = $this->smarthr->getEmployee($get);
        $ticket_filter['id']=intval($user->ticket_user_id);
        $ticket = new  TicketsAPI();
        $data['ticket_users'] =$ticket->getUser($ticket_filter);
        $erp_filter['id']=intval($user->erp_user_id);
        $erp = new  ErpAPI();
        $data['erp_users'] =  $erp->getUser($erp_filter);
        $task = new  TaskAPI();
        $task_filter['id']=intval($user->task_user_id);
        $data['task_users'] = $task->getUser($task_filter);*/
        return  view('admin/team_member/edit', $data);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5',
            'role_id' => 'required',

        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->hr_user_id = $request->hr_user_id;
        $user->task_user_id = $request->task_user_id;
        $user->ticket_user_id = $request->ticket_user_id;
        $user->erp_user_id = $request->erp_user_id;
        
        $user->role_id = $request->role_id;
        $user->save();
        $this->createTeam($user);
        return returnMsg('success', 'admin/members-list', __('Information added successfully'));
        return redirect(route('members_list'));
    }
    public function update(Request $request)
    {

        $validator = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'role_id' => 'required',

        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->hr_user_id = $request->hr_user_id;
        $user->task_user_id = $request->task_user_id;
        $user->ticket_user_id = $request->ticket_user_id;
        $user->erp_user_id = $request->erp_user_id;
        $user->role_id = $request->role_id;
        $user->id = $request->id;
        $user->save();
        return returnMsg('success', 'admin/members-list', __('Information updated successfully'));
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete($id);
        return returnMsg('success', 'admin/members-list', __('Delete proccess done successfully'));
    }
    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }

    public function add_hr_employee()
    {
        return view('admin/team_member/add_hr_employee');
    }
    public function storeHRUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name_ar' => 'required',
            'full_name_en' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'branch_id' => 'required|numeric',
            'dept_id' => 'required|numeric',
            'direct_manager_id' => 'required|numeric',
            'work_schedule_id' => 'required|numeric',
            'job_time' => 'required',
            'holiday_no' => 'required|numeric',
            "employee_salary" => 'required|numeric',
            "salary_currency" => 'required',
            "emp_job_number" => 'required',
            "password" => 'required|min:5',
            "role_id" => 'required|numeric',
            "employee_type" => 'required|numeric',
            "date_of_birth" => 'required|date',
            "joining_date" => 'required|date',

        ]);

        if (!$validator->fails()) {
            $data = $_POST;
            $data['section_id'] = 0;
            $data['nationality'] = 0;
            $data['maratial_status'] = 0;
            $data['job_place_id'] = 0;
            $data['auto_attendance']=0;
            $data['job_title']=0;
            $data['status']=1;
            unset($data['_token']);
            $AddEmployee=$this->smarthr->AddEmployee($data);

            if($AddEmployee->success==true)
            return response()->json(['success' =>true,'message'=> $AddEmployee->message]);
        else
        return response()->json(['success' =>false,'errors' =>[],'message'=> $AddEmployee->message]);
        }
        return response()->json(['success'=>false,'message'=>'','errors' => $validator->errors()]);
    }
}
