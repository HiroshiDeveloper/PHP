<?php

require "../../mysql.php";

$userName = $_POST['userName'];
$password = $_POST['password'];
$flg = 0;
$message = '';

if (empty($userName)) {
	$message = $message . '"User Name" ';
	$flg = -1;
}
if (empty($_POST["password"])) {
	$message = $message . '"Password" ';
	$flg = -1;
}
if($flg == 0){
	try{
		$selectSql = "SELECT * FROM users WHERE userName='".$userName."'". "and ". "password='".$password."'";
		$data = $pdo->query($selectSql);
		error_log($selectSql);
		if(empty($data)){
			echo '1'.','.'Please check user name and password again';
			return;
		}

		error_log('Success');
		$dataFetch = $data->fetch();
		echo '0'.','.'Welocome to '.$dataFetch['userName'];

	}catch(PDOException $e){
		header('Content-Type: text/plain; charset=UTF-8', true, 500);
		exit($e->getMessage());
	}

}else{
	$message = 'Please type ' . $message;
	echo '1'.','.$message;
}

?>
