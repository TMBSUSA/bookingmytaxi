<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function convert_price($price){
	return CURRENCY . $price;
}
function convert_date($date){
	return date("d-m-Y", strtotime($date));
}
function convert_date_time($date){
	return date("d-m-Y H:i:s", strtotime($date));
}
function convert_date_time_db($date){
	return date("Y-m-d H:i:s", strtotime($date));
}
function query(){
	echo $this->db->last_query();
	exit;
}
function debug($data){
	echo "<pre>";
	print_r($data);
	exit;
}
function send_email($subject,$to,$from,$body){
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
	// More headers
	$headers .= "From: <$from>" . "\r\n";
	
	if(mail($to,$subject,$body,$headers)){
		return 1;
	}
	else{
		return 0;
	}
}
