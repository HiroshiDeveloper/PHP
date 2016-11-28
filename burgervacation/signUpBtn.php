<?php
require "../../mysql.php";

if (isset($_POST["signUpBtn"])) {
	
	$userName = $_POST['userName'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];
	$password = $_POST['password'];
	$date = date("Y/m/d");
        $errorMessage ='';
        $flg = 0;

        if (empty($userName)) {
                $errorMessage = $errorMessage . '"User Name" ';
                $flg = -1;
        }
        if (empty($phoneNumber)){
                $errorMessage = $errorMessage . '"Phone Number" ';
                $flg = -1;
        }
        if (empty($_POST["email"])) {
                $errorMessage = $errorMessage .  '"Email" ';
                $flg = -1;
        }
        if (empty($_POST["password"])) {
                $errorMessage = $errorMessage . '"Password" ';
                $flg = -1;
        }
        if($flg == 0){
                $errorMessage = '';
                $successMessage = 'Success';
		
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
			
		}catch(PDOException $e){
			header('Content-Type: text/plain; charset=UTF-8', true, 500);
			exit($e->getMessage());
		}
	}else{
		$errorMessage = 'Please type ' . $errorMessage;
	}
}

?>
