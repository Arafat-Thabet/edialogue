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

    public $auth_token = '458TGgA73Hl3ljZCVq2gdUZoZAoEI1EXUmc8G+2o53aIY5o3cCG+egvy9UayJCFlTUcV3xXJ0RIxRYCH8O6XCaCgt6/VL8mK4x3E+gGdgGf8yA39HAghHzsiXmqTufhMBWiP9yIaONZCS2TEmVjV9jn0w@@221';
    public static $token = '458TGgA73Hl3ljZCVq2gdUZoZAoEI1EXUmc8G+2o53aIY5o3cCG+egvy9UayJCFlTUcV3xXJ0RIxRYCH8O6XCaCgt6/VL8mK4x3E+gGdgGf8yA39HAghHzsiXmqTufhMBWiP9yIaONZCS2TEmVjV9jn0w@@221';

    public function getUsers($post = array())
    {
        $response = Http::withHeaders([
            'authorization' => $this->auth_token
        ])->post(tickets_base_url('api/users'), $post);


        return response()->json($response->object()->result);
    }
    public static function loginUrl($user_id)
    {
        $token =   self::$token;
        $data['token'] = $token;
        $data['user_id'] = $user_id;
        $encrypt_url=encrypt_url($data);
        $url=tickets_base_url('login/edialogue?uri='.$encrypt_url);
        return $url;
    }
}
