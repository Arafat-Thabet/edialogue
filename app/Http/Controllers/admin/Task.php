<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Api\TaskAPI;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\DataTables;


class Task extends Controller
{
    public function __construct()
    {
        $this->task_api = new  TaskAPI();
    }
    public function add()
    {
        $data=[];
        return view('admin/task/add_user');
    }
    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'password' => 'required|min:6',
            "role_id" => 'required|numeric',
            "direct_manager_id" => 'required|numeric',
            "department_id" => 'required|numeric',
            
        ]);

        if (!$validator->fails()) {
            $data = $_POST;
            unset($data['_token']);
            $add=$this->task_api->addUser($data);
            if($add->success==true)
            return response()->json(['success' =>true,'message'=> $add->message]);
        else
        return response()->json(['success' =>false,'errors' =>[],'message'=> $add->message]);
        }
        return response()->json(['success'=>false,'message'=>'','errors' => $validator->errors()]);
    }
    public function getRolesList(){
        $get = $_GET ? $_GET : [];
     return $this->task_api->getRolesList($get);   
    }
    public function getDepartmentsList(){
        $get = $_GET ? $_GET : [];
     return $this->task_api->getDepartmentsList($get);   
    }
    
    public function getUsers(){
        $filter = $_GET ? $_GET : [];
        $users = User::where("task_user_id", ">", 0)->get();
        if ($users) {
            $not_ids = [];
            foreach ($users as $u) {
                $not_ids[] = $u->task_user_id;
            }
            if (!empty($not_ids)) {
                $filter['not_ids'] = implode(',', $not_ids);
            }
        }
        return $this->task_api->getUsers($filter);
    }
    public function getManagerUsers(){
     
        $get = $_GET ? $_GET : [];
        return $this->task_api->getUsers($get);
    }
}