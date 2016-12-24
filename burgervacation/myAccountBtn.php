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
		$selectSql = "SELECT * FROM users WHERE userName='".$userName."'". " AND ". "password='".$password."'";
		$data = $pdo->query($selectSql);
		if($data->fetchColumn() == 0){
			echo '1'.','.'Please check user name and password again';
			return;
		}
		
		$userQuery = $pdo->prepare($selectSql);
		$userQuery->execute();
		$user = $userQuery;
		foreach($user as $dt){
			$userData = $dt;
		}
		
		session_start();
		$_SESSION['user'] = $userData['userName'];
		$_SESSION['id'] = $userData['userId'];

		$starSql = "SELECT * FROM userStars WHERE userId='".$userData['userId']."'";
		$starQuery = $pdo->prepare($starSql);
		$starQuery->execute();
		$stars = $starQuery;
		foreach($stars as $dt){
			$starData = $dt;
		}
		
		error_log($starData['date']);
		$pretime = strtotime($starData['date']);
		$now = strtotime(date("Y/m/d H:i:s"));
		$comp = $now - $pretime;	//compare
		$comp = $comp/60;		//comvert to minutes

		error_log("######");
		error_log($pretime);
		error_log($now);
		error_log($comp);

		if ( (int)$comp > 1440 ) //check the hour that is over 24 hours 60*24
		{	
			error_log("==TEST==");
			$numStar = intval($starData['stars']) + 1;
			$date = date("Y/m/d H:i:s");
			$stmtStars = $pdo -> prepare("UPDATE userStars SET stars=:udStars, date=:udDate WHERE userId=:udUserId");
			$stmtStars->bindParam(':udUserId', $starData['userId'], PDO::PARAM_INT);
			$stmtStars->bindParam(':udStars', $numStar, PDO::PARAM_INT);
			$stmtStars->bindParam(':udDate', $date, PDO::PARAM_STR);
			$stmtStars->execute();
			$_SESSION['stars'] = $numStar;
		}else{
			$_SESSION['stars'] = $starData['stars'];
		}
		echo '0'.','.'Welocome to '.$userData['userName'];
	}catch(PDOException $e){
		header('Content-Type: text/plain; charset=UTF-8', true, 500);
		exit($e->getMessage());
	}

}else{
	$message = 'Please type ' . $message;
	echo '1'.','.$message;
}

?>
