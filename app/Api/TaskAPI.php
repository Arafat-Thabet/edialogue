<?php

namespace App\Api;

use Illuminate\Support\Facades\Http;

class TaskAPI
{
  

    protected $auth_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJjb21wYW55IjoibmV3dGVzdCIsInVybF9jb2RlIjoic21hcnRfaHIiLCJBUElfVElNRSI6MTY0NDQyMzc5MX0.lqybDfWWtfMKJOoOrNw2LGPeGE4oEpOJgDl-_wmtI38';
    protected static $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJjb21wYW55IjoibmV3dGVzdCIsInVybF9jb2RlIjoic21hcnRfaHIiLCJBUElfVElNRSI6MTY0NDQyMzc5MX0.lqybDfWWtfMKJOoOrNw2LGPeGE4oEpOJgDl-_wmtI38';
    public function getUsers($get = array())
    {
        $response = Http::withHeaders([
            'Access-Token' => $this->auth_token
        ])->get(task_base_url('api/users/users_list'), $get);
        return response()->json($response->object()->data);
    }
    public static function loginUrl($user_id)
    {
        $token =   self::$token;
        $data['token'] = $token;
        $data['user_id'] = $user_id;
        $encrypt_url=encrypt_url($data);
        $url=task_base_url('api/users/auto_login?uri='.$encrypt_url);
        return $url;
    }
    public function addUser($post=[]){
        $response = Http::withHeaders([
            'Access-Token' => $this->auth_token
        ])->post(task_base_url('api/users/add'), $post);
        return $response->object();
    }
    public function getUser($get = array())
    {
        $response = Http::withHeaders([
            'Access-Token' => $this->auth_token
        ])->get(task_base_url('api/users/users_list'), $get);

        return $response->object()->data;
    }
    public function getRolesList($get = array())
    {
        $response = Http::withHeaders([
            'Access-Token' => $this->auth_token
        ])->get(task_base_url('api/users/roles_list'), $get);
        return response()->json($response->object()->data);
    }
    public function getDepartmentsList($get = array())
    {
        $response = Http::withHeaders([
            'Access-Token' => $this->auth_token
        ])->get(task_base_url('api/users/departments_list'), $get);
        return response()->json($response->object()->data);
    }
    public static function checkUserEmail($email)
    {
        $post['email']=$email;
        $response = Http::withHeaders([
            'Access-Token' => self::$token
        ])->post(task_base_url('api/users/check_user_email'), $post);
        return (isset($response->object()->user_id) ? $response->object()->user_id : 0);
    }
}
  
