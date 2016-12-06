<?php
require "../../mysql.php";

$userName = $_POST['userName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$date = date("Y/m/d");
$flg = 0;
$message = "";

if (empty($userName)) {
	$message = $message . '"User Name" ';
	$flg = -1;
}
if (empty($phoneNumber)){
	$message = $message . '"Phone Number" ';
	$flg = -1;
}
if (empty($_POST["email"])) {
	$message = $message .  '"Email" ';
	$flg = -1;
}
if (empty($_POST["password"])) {
	$message = $message . '"Password" ';
	$flg = -1;
}
if($flg == 0){
	//$dsn = (../../mysql.php)
	$user = 'LAA0786421';
	$pass = "danielpowter";
	try{

		$checkSql = "SELECT * FROM users WHERE userName='".$userName."'";
		$data = $pdo->query($checkSql);
		
		/* DATA TEST
		foreach($data as $dt){
			error_log($dt['userName']." : ".$dt['date']);
		}
		*/

		if(!empty($data)){ 
			echo '1'.','.'The user name is taken';
			return;
		}
		
		// local
		// my server
		// read "../../mysql.php" : $pdo = ~
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $pdo -> prepare("INSERT INTO users (userName, phoneNumber, email, password, date) VALUES (:userName, :phoneNumber, :email, :password, :date)");
			
		$stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
		$stmt->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		$stmt->bindParam(':date', $date, PDO::PARAM_STR);
		$stmt->execute();

		$message = 'Success';
		echo '0'.','.$message;
			
	}catch(PDOException $e){
		header('Content-Type: text/plain; charset=UTF-8', true, 500);
		exit($e->getMessage());
	}
}else{
	$message = 'Please type ' . $message;
	echo '1'.','.$message;
}

?>
