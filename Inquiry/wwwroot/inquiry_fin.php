<?php
// inquiry_fin.php


$params = array('email','name','birthday','body');
$input_data=array();
foreach($params as $p){
	$input_data[$p] = (string)@$_POST[$p];
}
var_dump($input_data);

//validate
$error_detail = array();

//
$must_params = array('email','body');
foreach($must_params as $p){
	if ('' === $input_data[$p]){
			//error maintain
		$error_detail["error_must_{$p}"] = true;
	}
}
//empty check:email
//XXX RFC request for comment 
if (false === filter_var($input_data['email'], FILTER_VALIDATE_EMAIL)) {
	//error maintain
	$error_detail["error_format_email"] = true;
}

//empty check:date
if ('' == $input_data['birthday']) {
	if (false === strtotime($input_data['birthday'])) {
		//error maintain
		$error_detail["error_format_birthday"] = true;
	}
}


//error control
if(array() != $error_detail){
//
	echo 'there is error!!';
	exit;
}
//ダミー
echo "your validation of data is ok!!";


?>