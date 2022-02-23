<?php

namespace App\Http\Controllers;

use App\Api\ErpAPI;
use App\Api\SmartHRAPI;
use App\Api\TaskAPI;
use App\Api\TicketsAPI;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $data = array();
           
            $hr_user_id=39;
            if(Auth::user()->id==1){
                $hr_user_id=39;
            }else{
                $hr_user_id=SmartHRAPI::checkUserEmail(Auth::user()->email);
            }
            $data['smart_hr_url'] = SmartHRAPI::loginUrl($hr_user_id);
            if(Auth::user()->id==1){
                $ticket_user_id=1;
            }else{
                $ticket_user_id=TicketsAPI::checkUserEmail(Auth::user()->email);
            }
            $data['ticket_url']=TicketsAPI::loginUrl($ticket_user_id);

            if(Auth::user()->id==1){
                $task_user_id=35;
            }else{
                $task_user_id=TaskAPI::checkUserEmail(Auth::user()->email);
            }
            $data['task_url']=TaskAPI::loginUrl($task_user_id);
            if(Auth::user()->id==1){
                $erp_user_id=1;
            }else{
                $erp_user_id=TaskAPI::checkUserEmail(Auth::user()->email);
            }
            $data['erp_url']=ErpAPI::loginUrl($erp_user_id);
            $data['hr_user_id']=$hr_user_id;
            $data['ticket_user_id']=$ticket_user_id;
            $data['task_user_id']=$task_user_id;
            $data['erp_user_id']=$erp_user_id;
            $data['user']=Auth::user();
            return  view('dashboard', $data);
        } else
            return view('auth/login');
    }
    
}
