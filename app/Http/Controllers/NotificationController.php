<?php

namespace App\Http\Controllers;

use App\Api\ErpAPI;
use App\Api\SmartHRAPI;
use App\Api\TaskAPI;
use App\Api\TicketsAPI;
use Illuminate\Http\Request;
use Yajra\Datatables\DataTables;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index()
    {
       
        return  view('notifications/index');
    }
    public function getData()
    {
        $user_id=auth()->user()->id;
        $users = DB::table('notifications')->select(['notifications.id', 'notifications.title', 'users.name', 'users.email','users.hr_user_id','users.task_user_id','users.erp_user_id','users.ticket_user_id','notifications.user_id', 'notifications.event', 'notifications.created_at'])->Join('users', 'users.id', '=', 'notifications.user_id')
        ->whereRaw("FIND_IN_SET('$user_id',notify_to)!=0")
        ->orderBy('created_at','DESC')->get();

        return Datatables::of($users)
            ->addColumn('action', function ($row) {
                $accept_url = route("accept-request",  ["type" => $row->event, 'id' => $row->id, "user_id" => $row->user_id]);
                $accept_lang = __('Accept request');
                $btn = '';
                $btn =  '<a  href="' . $accept_url . '" title="' . $accept_lang . '" class="edit mt-1 btn btn-primary btn-sm">' . $accept_lang . '</a>';
                $check = $this->checkUser($row,$row->event);
                $check_active = $this->checkActiveUser($row,$row->event);
                
                if ($check > 0 && $check_active>0) {
                    $accept_lang = __('Accepted request');
                    $accept_url = '#';
                    $btn =  '<a  href="' . $accept_url . '" title="' . $accept_lang . '" class="edit mt-1 btn btn-success btn-sm">' . $accept_lang . '</a>';
                }
                return $btn;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'DT_RowIndex'])

            ->make(true);
    }

    public function accept_request($type, $id)
    {
        $notice = $data['notice'] = Notifications::find($id);
        $user = $data['user'] = User::find(intval($_GET['user_id']));
        $check_id = $this->checkUser($user, $notice->event);
        $check_active = $this->checkActiveUser($user, $notice->event);
        
        $data['check_id'] = $check_id;
  
        $user_id=auth()->user()->id;
        $sql = "FIND_IN_SET('$user_id',send_to)!=0 ";
        $check =Notifications::select('*')->whereRaw("FIND_IN_SET('$user_id',notify_to)!=0")->whereRaw("FIND_IN_SET('$user_id',read_by)=0")->get()->first();
      
        if (isset($check->id)) {
        
           $saved =   DB::statement("UPDATE notifications SET read_by = CONCAT(read_by,',$user_id') WHERE FIND_IN_SET('$user_id',read_by)=0 AND id=$id");
        }
        return view('notifications/detail', $data);
    }
    private function checkUser($user, $sys_type)
    {
       
        if (!isset($user->email)) {
            return 0;
        }
        if ($sys_type == 'active_hr')
            return SmartHRAPI::checkUserEmail($user->email);
        if ($sys_type == 'active_task')
            return  TaskAPI::checkUserEmail($user->email);
        if ($sys_type == 'active_ticket')
            return TicketsAPI::checkUserEmail($user->email);
        if ($sys_type == 'active_erp')
            return ErpAPI::checkUserEmail($user->email);
    }
    private function checkActiveUser($user, $sys_type)
    {
    
        if ($sys_type == 'active_hr')
            return $user->hr_user_id;
        if ($sys_type == 'active_task')
                return $user->task_user_id;
        if ($sys_type == 'active_ticket')
        return $user->ticket_user_id;
        if ($sys_type == 'active_erp')
        return $user->erp_user_id;
    }
    public function setActivesystem($user_id, $sys_type)
    {
        $user=  User::findOrFail($user_id);
        switch ($sys_type) {
            case "hr":
                $user->hr_user_id = 1;
                break;
            case "erp":
                $user->erp_user_id = 1;
                break;
            case "task":
                $user->task_user_id = 1;
                break;
            case "ticket":
                $user->ticket_user_id = 1;
                break;
        }
        $user->save();
        return returnMsg('success', 'admin/members-list', __('Account activated successfully'));

    }
}
