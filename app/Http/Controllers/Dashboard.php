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
            $data['smart_hr_url'] = SmartHRAPI::loginUrl(Auth::user()->hr_user_id);
            $data['ticket_url']=TicketsAPI::loginUrl(Auth::user()->ticket_user_id);
            $data['task_url']=TaskAPI::loginUrl(Auth::user()->task_user_id);
            $data['erp_url']=ErpAPI::loginUrl(Auth::user()->erp_user_id);
            $data['user']=Auth::user();
            return  view('dashboard', $data);
        } else
            return view('auth/login');
    }
}
