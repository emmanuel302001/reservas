<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function executeCurlGet($data){
	$curl_handle = curl_init();
	curl_setopt($curl_handle, CURLOPT_URL, $data['url']);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 2);
	curl_setopt($curl_handle, CURLOPT_HEADER, 0);
	$resp = json_decode(curl_exec($curl_handle),true);
	curl_close($curl_handle);

	return $resp;
}
function executeCurlPost($data){
	$curl_handle = curl_init();
	curl_setopt($curl_handle, CURLOPT_URL, $data['url']);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 2);
	curl_setopt($curl_handle, CURLOPT_HEADER, 0);
	curl_setopt($curl_handle, CURLOPT_POST, 1);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data['datos']);
	$resp = json_decode(curl_exec($curl_handle),true);
	curl_close($curl_handle);

	return $resp;
}
?>