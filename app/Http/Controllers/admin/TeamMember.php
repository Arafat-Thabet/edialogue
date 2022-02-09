<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Smarthr\SmartHRAPI;
use Illuminate\Http\Request;

class TeamMember extends Controller
{
 
    public function add(){
        $smarthr=new  SmartHRAPI();
        $get=$_GET ? $_GET :[];
        $smarthr->getEmployees($get);
       return  view('admin/team_member/add');
    }
    public function getHREmployees(){
        $smarthr=new  SmartHRAPI();
        $get=$_GET ? $_GET :[];
        $smarthr->getEmployees($get);
    }
}
