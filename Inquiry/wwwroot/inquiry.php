<?php

//
ob_start();
session_start();

//check
//var_dump($_SESSION);

//入力内を。。
//$input = $_SESSION['buffer']['input'];
if (true === isset($_SESSION['buffer']['input'])) {
		$input = $_SESSION['buffer']['input'];
}else {
     //input =[];
    $input = array();
}
// error
//$error_detail = $_SESSION['buffer']['error_detail'];
if (true === isset($_SESSION['buffer']['error_detail'])) {
		$error_detail = $_SESSION['buffer']['error_detail'];
}
//xss
function h($s) {
    return htmlspecialchars($s, ENT_QUOTES);
}

?>

<html>
<head>
<title></title>
<meta charset="UTF-8">

</head>
<body>

<?php
	if (0 < count($error_detail)) {
		echo '<div style = "color: red;">there is error</dir>';
	}



	//error_must_email
	if (isset($error_detail['error_must_email'])) {
		echo '<div style = "color: red;">email is needed</dir>';
	}


?>


	<form action = "./inquiry_fin.php" method ="post">
		emailアドレス(*):<input type= "text" name ="email"
 value="<?php echo h((string)@$input['email']); ?>"><br>
		名前:<input type="text" name="name" 
value="<?php echo h((string)@$input['name']); ?>"><br>
		誕生日:<input type="text" name="birthday" 
value="<?php echo h((string)@$input['birthday']); ?>"><br>
		お問い合わせ<textarea name="body"></textarea></br>
		<button>お問い合わせ</button>
	</form>

</body>
</html>
