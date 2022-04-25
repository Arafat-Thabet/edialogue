<?php

namespace App\Api;

use Illuminate\Support\Facades\Http;

class TicketsAPI
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */

    protected $auth_token = '458TGgA73Hl3ljZCVq2gdUZoZAoEI1EXUmc8G+2o53aIY5o3cCG+egvy9UayJCFlTUcV3xXJ0RIxRYCH8O6XCaCgt6/VL8mK4x3E+gGdgGf8yA39HAghHzsiXmqTufhMBWiP9yIaONZCS2TEmVjV9jn0w@@221';
    protected static $token = '458TGgA73Hl3ljZCVq2gdUZoZAoEI1EXUmc8G+2o53aIY5o3cCG+egvy9UayJCFlTUcV3xXJ0RIxRYCH8O6XCaCgt6/VL8mK4x3E+gGdgGf8yA39HAghHzsiXmqTufhMBWiP9yIaONZCS2TEmVjV9jn0w@@221';

    public function getUsers($post = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->get(tickets_base_url('api/cdialog/users'), $post);


        return $response->object()->result;
    }
    public static function loginUrl($user_id)
    {
        $token =   self::$token;
        $data['token'] = $token;
        $data['id'] = $user_id;
        $encrypt_url=encrypt_url($data);
        $url=tickets_base_url('auto_login?uri='.$encrypt_url);
        return $url;
    }
    public function addUser($post=[]){
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->post(tickets_base_url('api/cdialog/user'), $post);
        return $response->object();
    }
    public function getUser($get = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->get(tickets_base_url('api/cdialog/users'), $get);


        return $response->object()->result;
    }
    public function getGroupsList($get = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->get(tickets_base_url('api/cdialog/groups'), $get);

        return $response->object()->result;
    }
    public static function checkUserEmail($email)
    {
        $get['email']=$email;
        $response = Http::withHeaders([
            'authorization' => self::$token
        ])->get(tickets_base_url('api/cdialog/user'), $get);
    
        return (isset($response->object()->user_id) ? $response->object()->user_id : 0);
    }
}
