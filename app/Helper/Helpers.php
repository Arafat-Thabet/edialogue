<?php 
if(!function_exists('hr_api_url')){
    function hr_api_url($url=''){
      return  'http://localhost/smarthr/'.$url;
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