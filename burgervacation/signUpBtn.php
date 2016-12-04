<?php
require "../../mysql.php";

$userName = '';
$phoneNumber = '';
$email = '';
$password = '';
$date = '';
//$errorMessage ='';
//$successMessage = '';
$message = ''; 

//if (isset($_POST["signUpBtn"])) {
	error_log("PHP TEST");
	$userName = $_POST['userName'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];
	$password = $_POST['password'];
	$date = date("Y/m/d");
        $flg = 0;

        if (empty($userName)) {
                //$errorMessage = $errorMessage . '"User Name" ';
                $message = $message . '"User Name" ';
		$flg = -1;
        }
        if (empty($phoneNumber)){
                $errorMessage = $errorMessage . '"Phone Number" ';
                $message = $message . '"Phone Number" ';
		$flg = -1;
        }
        if (empty($_POST["email"])) {
                //$errorMessage = $errorMessage .  '"Email" ';
                $message = $message .  '"Email" ';
		$flg = -1;
        }
        if (empty($_POST["password"])) {
                //$errorMessage = $errorMessage . '"Password" ';
                $message = $message . '"Password" ';
		$flg = -1;
        }
        if($flg == 0){
                //$errorMessage = '';
                //$successMessage = 'Success';
		
		//$dsn = (../../mysql.php)
		$user = 'LAA0786421';
		$pass = "danielpowter";
		try{
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
			echo $message;
			
		}catch(PDOException $e){
			header('Content-Type: text/plain; charset=UTF-8', true, 500);
			exit($e->getMessage());
		}
	}else{
		//$errorMessage = 'Please type ' . $errorMessage;
		//echo $errorMessage;
		$message = 'Please type ' . $message;
		echo $message;
	}
	
	//header( "Location: ./main.php#signUp" );
//}

?>
