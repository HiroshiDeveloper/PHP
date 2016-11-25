<?php
//require "../burgerVacationMySql.php";
require "../../mysql.php";
if (isset($_POST["signUpBtn"])) {
        $userName = $_POST['userName'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];
	$password = $_POST['password'];
	$registeredDate = date("Y/m/d");
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
			$pdo = new PDO('mysql:host=mysql108.phy.lolipop.lan;dbname=LAA0786421-hiroshi;charset=utf8','LAA0786421','danielpowter', array(PDO::ATTR_EMULATE_PREPARES => false));

			/*
			$stmt = $pdo -> prepare("INSERT INTO users (userName, phoneNumber, email, password, registeredDate) VALUES (:userName, :phoneNumber, :email, :password, :registeredDate)");
			$stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
			$stmt->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_INT);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':password', $password, PDO::PARAM_STR);
			$stmt->bindParam(':registeredDate', $registeredDate, PDO::PARAM_STR);
			$stmt->execute();
			 */

			/*
			$dbh = new PDO($dsn,$user,$pass);
			$sql = 'INSERT INTO users(userName, phoneNumber, email, password) VALUES(?, ?, ?, ?)';
			
			$arr = [$userName, $phoneNumber, $email, $password];
			$stmt = $dbh->prepare($sql);
			$stmt->execute($arr);
			 */
		}catch(PDOException $e){
			header('Content-Type: text/plain; charset=UTF-8', true, 500);
			exit($e->getMessage());
		}
	}else{
		$errorMessage = 'Please type ' . $errorMessage;
	}
}

?>
