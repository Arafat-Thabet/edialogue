<?php

namespace App\Smarthr;

use Illuminate\Support\Facades\Http;

class SmartHRAPI
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $base_url = 'http://localhost/smarthr/';
    public $auth_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJjb21wYW55IjoiZWRpYWxvZ3VlIiwidXJsX2NvZGUiOiJzbWFydF9ociIsIkFQSV9USU1FIjoxNjQ0NDE5ODY0fQ.BsXkCdFXlvU2ZjA9_h1xNH608iVK8b-Hbjx1ljz7OWE';
    public function __construct(){
        $this->auth_token='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJjb21wYW55IjoibmV3dGVzdCIsInVybF9jb2RlIjoic21hcnRfaHIiLCJBUElfVElNRSI6MTY0NDQyMzc5MX0.lqybDfWWtfMKJOoOrNw2LGPeGE4oEpOJgDl-_wmtI38';
    }
    public function getEmployees($get = array())
    {
        $response = Http::withToken([
            'authorization' => $this->auth_token,
          

        ])->get($this->api_url('api/edialogue/employees_list'), $get);
   
        dd($response);
        return response()->json($response->object(), 200);
    
    }
    public function api_url($api)
    {
        return $this->base_url . $api;
    }
}
