<?php

namespace App\Api;

use Illuminate\Support\Facades\Http;

class ErpAPI
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */

    protected $auth_token = '412x8AyN68YWGlJL47lxeurvboYtoLoT7pZw05sWKW8vuK7UbogJs1aGuM1aZXPXFTBv1gzR40KwuwN1jQjBslVjpNqx3jDzO88gCX9qUfILFO1CVT9d1+Xlopjo+4IokegRgPTiaKvQIS7t4vXoxGzkA@@755';
    protected static $token = '412x8AyN68YWGlJL47lxeurvboYtoLoT7pZw05sWKW8vuK7UbogJs1aGuM1aZXPXFTBv1gzR40KwuwN1jQjBslVjpNqx3jDzO88gCX9qUfILFO1CVT9d1+Xlopjo+4IokegRgPTiaKvQIS7t4vXoxGzkA@@755';

    public function getUsers($get = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->get(erp_url('api/cdialog/users'), $get);
        return response()->json($response->object()->result);
    }
    public static function loginUrl($user_id)
    {
        $token =   self::$token;
        $data['token'] = $token;
        $data['id'] = $user_id;
        $encrypt_url=encrypt_url($data);
        $url=erp_url('autologin?uri='.$encrypt_url);
        return $url;
    }
    public function addUser($post=[]){
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->post(erp_url('api/cdialog/user'), $post);
        return $response->object();
    }
    public function getUser($get = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->get(erp_url('api/cdialog/users'), $get);


        return $response->object()->result;
    }
    public function getGroupsList($get = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token,
            'Cookie'=>'_client=test3; sess=u2li7tqolg9dbsvmd32800ucc9u54n5m'
        ])->get(erp_url('api/cdialog/groups'), $get);

        return $response->object()->result;
    }
    public static function checkUserEmail($email)
    {
        $get['email']=$email;
        $response = Http::withHeaders([
            'authorization' => self::$token
        ])->get(erp_url('api/cdialog/user'), $get);
       
        return (isset($response->object()->user_id) ? $response->object()->user_id : 0);
    }
}
