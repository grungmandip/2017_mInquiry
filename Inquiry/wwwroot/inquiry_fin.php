<?php
// inquiry_fin.php
//
ob_start();
session_start();

//入力された情報を取得

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
//エラー内容をセッションに入れて見る
	$_SESSION['buffer']['error_detail'] = $error_detail;
	//入力された情報を取得
	$_SESSION['buffer']['input'] = $input_data;
	//echo 'there is error!!';
//入力ページに空き…
	header('Location: ./inquiry.php');
	exit;
}
//ダミー
echo "your validation of data is ok!!";

//入力された情報をDBにinsert

//


?>