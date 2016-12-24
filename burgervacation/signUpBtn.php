<?php
require "../../mysql.php";

$userName = $_POST['userName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$date = date("Y/m/d H:i:s");
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
	//$user = 'LAA0786421';
	//$pass = "danielpowter";
	
	try{

		$checkSql = "SELECT * FROM users WHERE userName='".$userName."'";
		$data = $pdo->query($checkSql);
		
		/* DATA TEST
		foreach($data as $dt){
			error_log("---");
			error_log($dt['userName']." : ".$dt['date']);
		}
		 */
		
		if($data->fetchColumn() > 0){ 
			echo '1'.','.'The user name is taken';
			return;
		}

		// local
		// my server
		// read "../../mysql.php" : $pdo = ~
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// insert data into users table
		$stmt = $pdo -> prepare("INSERT INTO users (userName, phoneNumber, email, password, date) VALUES (:userName, :phoneNumber, :email, :password, :date)");
			
		$stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
		$stmt->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		$stmt->bindParam(':date', $date, PDO::PARAM_STR);
		$stmt->execute();
		
		//get userId
		$userGetSql = "SELECT * FROM users WHERE userName='".$userName."'";
		$user = $pdo->query($userGetSql);

		foreach($user as $dt){
			error_log("#######DATA######");
			$userData = $dt;
		}

		//insert data into userStars table
		$stars = 3;
		$stmtStars = $pdo -> prepare("INSERT INTO userStars (userId, stars, date) VALUES (:userId, :stars, :date)");
		$stmtStars->bindParam(':userId', $userData['userId'], PDO::PARAM_INT);
		$stmtStars->bindParam(':stars', $stars, PDO::PARAM_INT);
		$stmtStars->bindParam(':date', $date, PDO::PARAM_STR);
		$stmtStars->execute();

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
