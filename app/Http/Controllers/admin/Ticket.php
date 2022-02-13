<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Api\TicketsAPI;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\DataTables;


class Ticket extends Controller
{
    public function __construct()
    {
        $this->ticket_api = new  TicketsAPI();
    }
    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'pass' => 'required|min:6',
            "group_id" => 'required|numeric',
           

        ]);

        if (!$validator->fails()) {
            $data = $_POST;
            unset($data['_token']);
            $add=$this->ticket_api->addUser($data);

            if($add->success==true)
            return response()->json(['success' =>true,'message'=> $add->message]);
        else
        return response()->json(['success' =>false,'errors' =>[],'message'=> $add->message]);

        }

        return response()->json(['success'=>false,'message'=>'','errors' => $validator->errors()]);
    }
}