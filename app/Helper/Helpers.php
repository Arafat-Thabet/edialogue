<?php

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

if (!function_exists('hr_api_url')) {
	function hr_api_url($url = '')
	{
		return  'http://localhost/smarthr/' . $url;
	}
}
/**
 * encrypt url array
 *
 * @param array $url_perms [Exp: array("token"=>"a44s....","company"=>"smart","user_id"=>1)]
 * @return string
 */
if (!function_exists('encrypt_url')) {
	function encrypt_url($params = array())
	{
		$key = md5("RT935136HH7b63C27AA74CDCC2BB");
		$cipher = "AES-128-CBC";

		$params = serialize($params);
		$bytes = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
		$encrypt = openssl_encrypt($params, $cipher, $key,  OPENSSL_RAW_DATA, $bytes);
		$hmac = hash_hmac('sha256', $encrypt, $key, true);
		return rand(100, 999) . str_replace("=", "@", base64_encode($bytes . $hmac . $encrypt)) . rand(100, 999);
	}
}
if (!function_exists('tickets_base_url')) {
	function tickets_base_url($url = '')
	{
		return "http://tickets.smart-hr.top/" . $url;
	}
}
if (!function_exists('task_base_url')) {
	function task_base_url($url = '')
	{
		return "http://localhost/taskroken/" . $url;
	}
}
if (!function_exists('erp_url')) {
	function erp_url($url = '')
	{
		return "http://test.smarterp.top/" . $url;
	}
}
if (!function_exists('is_admin')) {
	function is_admin()
	{
		if (auth()->user()->role_id == 1) {
			return true;
		} else {
			return false;
		}
	}
}

if (!function_exists('message_box')) {
    function message_box($message_type)
    {
      
       $message ='';
       $retval='';
       $message= Session()->get("$message_type");

        if($message){
        $retval='';
            $lang_type=__($message_type);
		    $retval.="<script>  $(document).ready(function() {
                (function ($) {Swal.fire(
                ' $lang_type!',
                '$message',
                '$message_type'
            );    }($));}).delay( 800 );</script>";
        }
            return $retval;
        }
    }

    if (!function_exists('returnMsg')){
        function returnMsg($type,$uri, $message)
        {
			session()->flash($type,$message);
            if (!$uri) {
                $uri = 'dashboard';
    
            }
            if (!empty($uri)) {
				//return redirect(route($uri));
				return  redirect($uri);
              
            }
            return false;
        }
    }
	/**
 * prepare a anchor tag for modal 
 * 
 * @param string $url
 * @param string $title
 * @param array $attributes
 * @return html link of anchor tag
 */
if (!function_exists('modal_anchor')) {

	function modal_anchor($url, $title = '', $attributes = array())
	{
		$attributes["data-act"] = "ajax-modal";
		if (in_array("data-modal-title", $attributes) && isset($attributes['data-modal-title'])) {
			$attributes["data-title"] = $attributes["data-modal-title"];
		} else {
			$attributes["data-title"] = $attributes["title"];
		}
		$attributes["data-action-url"] = $url;

		return js_anchor($title, $attributes);
	}
}

/**
 * prepare a anchor tag for any js request
 * 
 * @param string $title
 * @param array $attributes
 * @return html link of anchor tag
 */
if (!function_exists('js_anchor')) {

	function js_anchor($title = '', $attributes = '')
	{
		$title = (string) $title;
		$html_attributes = "";

		if (is_array($attributes)) {
			foreach ($attributes as $key => $value) {
				$html_attributes .= ' ' . $key . '="' . $value . '"';
			}
		}

		return '<a href="#"' . $html_attributes . '>' . $title . '</a>';
	}
}
if (!function_exists('sys_lang')) {

	function sys_lang()
	{
		return app()->getLocale();
	}
}
