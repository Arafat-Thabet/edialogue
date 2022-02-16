<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Api\ErpAPI;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\DataTables;


class Smarterp extends Controller
{
    public function __construct()
    {
        $this->erp_api = new  ErpAPI();
    }
    public function add()
    {
        $data=[];
        return view('admin/smarterp/add_user');
    }
    public function getUsers(){
        $filter = $_GET ? $_GET : [];
        $users = User::where("erp_user_id", ">", 0)->get();
        if ($users) {
            $not_ids = [];
            foreach ($users as $u) {
                $not_ids[] = $u->erp_user_id;
            }
            if (!empty($not_ids)) {
                $filter['not_ids'] = implode(',', $not_ids);
            }
        }
        return $this->erp_api->getUsers($filter);
    }
    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'pass' => 'required|min:6',
            "group_id" => 'required|numeric',
           

        ]);

        if (!$validator->fails()) {
            $data = $_POST;
            unset($data['_token']);
            $add=$this->erp_api->addUser($data);

            if($add->success==true)
            return response()->json(['success' =>true,'message'=> $add->message]);
        else
        return response()->json(['success' =>false,'errors' =>[],'message'=> $add->message]);

        }

        return response()->json(['success'=>false,'message'=>'','errors' => $validator->errors()]);
    }
    public function getGroupsList(){
        $get = $_GET ? $_GET : [];
       $result= $this->erp_api->getGroupsList($get);
        return response()->json($result);
    }
}