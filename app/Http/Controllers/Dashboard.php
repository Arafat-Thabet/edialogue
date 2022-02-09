<?php

namespace App\Http\Controllers;

use App\Api\SmartHRAPI;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $data = array();
            $data['smart_hr_url'] = SmartHRAPI::loginUrl(Auth::user()->hr_user_id);
            return  view('dashboard', $data);
        } else
            return view('auth/login');
    }
}
