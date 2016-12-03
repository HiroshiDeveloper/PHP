<?php

$userName = '';
$password = '';
$errorAccountMsg ='';
$successAccountMsg = '';

if(isset($_POST["myAccountBtn"])){
	error_log("######PASS######");
	$userName = $_POST['userName'];
	$password = $_POST['password'];
	$flg = 0;

	if (empty($userName)) {
		$errorAccountMsg = $errorAccountMsg . '"User Name" ';
		$flg = -1;
	}
	if (empty($_POST["password"])) {
		$errorAccountMsg = $errorAccountMsg . '"Password" ';
		$flg = -1;
	}
	if($flg == 0){
	
	}else{
		$errorAccountMsg = 'Please type ' . $errorAccountMsg;
	}


}

?>
