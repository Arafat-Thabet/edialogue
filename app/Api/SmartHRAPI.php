<?php

namespace App\Api;

use Illuminate\Support\Facades\Http;

class SmartHRAPI
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */

    protected $auth_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJjb21wYW55IjoiZWRpYWxvZ3VlIiwidXJsX2NvZGUiOiJzbWFydF9ociIsIkFQSV9USU1FIjoxNjQ1Mjc3NjYyfQ.J_Z-4P02cHqeG-3hVVU_K54rGph3zAuYJ8fwf-CBnBE';
    protected static $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJjb21wYW55IjoiZWRpYWxvZ3VlIiwidXJsX2NvZGUiOiJzbWFydF9ociIsIkFQSV9USU1FIjoxNjQ1Mjc3NjYyfQ.J_Z-4P02cHqeG-3hVVU_K54rGph3zAuYJ8fwf-CBnBE';
    public function __construct()
    {
     //   self::$token=$this->auth_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJjb21wYW55IjoibmV3dGVzdCIsInVybF9jb2RlIjoic21hcnRfaHIiLCJBUElfVElNRSI6MTY0NDQyMzc5MX0.lqybDfWWtfMKJOoOrNw2LGPeGE4oEpOJgDl-_wmtI38';
    }
    public function getEmployees($post = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->post(hr_api_url('api/edialogue/employees_list'), $post);


        return response()->json($response->object()->data);
    }
    public function getEmployee($post = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->post(hr_api_url('api/edialogue/employees_list'), $post);


        return $response->object()->data;
    }
    public static function loginUrl($user_id)
    {
        $token =   self::$token;
        $data['token'] = $token;
        $data['company'] = 'edialogue';
        $data['user_id'] = $user_id;
        $encrypt_url=encrypt_url($data);
        $url=hr_api_url('login/edialogue?uri='.$encrypt_url);
        return $url;
    }
    public function getBranches($get = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->get(hr_api_url('api/edialogue/branches'), $get);
        return response()->json($response->object()->data);
    }
    public function getDepartments($get = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->get(hr_api_url('api/edialogue/departments'), $get);
        return response()->json($response->object()->data);
    }
    public function getWorkSchedules($get = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->get(hr_api_url('api/edialogue/work_schedules'), $get);
        return response()->json($response->object()->data);
    }
    public function getcurrenciesList($get = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->get(hr_api_url('api/edialogue/currencies_list'), $get);
        return response()->json($response->object()->data);
    }
    public function getUserRoles($get = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->get(hr_api_url('api/edialogue/user_roles'), $get);
        return response()->json($response->object()->data);
    }
    public function AddEmployee($post = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->post(hr_api_url('api/edialogue/add_employee'), $post);
        return $response->object();
    }
    
    public static function checkUserEmail($email)
    {
        $post['email']=$email;
        $response = Http::withHeaders([
            'authorization' => self::$token
        ])->post(hr_api_url('api/edialogue/check_user_email'), $post);
        return (isset($response->object()->user_id) ? $response->object()->user_id : 0);
    }
}
