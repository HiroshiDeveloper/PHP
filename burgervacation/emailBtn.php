<?php
require "../../mysql.php";

$userName = $_POST['userName'];

try{
	$checkSql = "SELECT * FROM users WHERE userName='".$userName."'";
	$data = $pdo->query($checkSql);
	$dataFetch = $data->fetch();
	
	if(empty($dataFetch)){
		echo '1'.','.'The user name was not found';
		return;
	}

	$to = $dataFetch['email'];
	$message = "Hi ".$dataFetch['userName'].".\n\n\nYour password is ".$dataFetch['password'].".\n\nIf you have further questions, feel free to ask us.\n\nThank you.\n\nSincerely,\nBurger Vacation\n============\nT : 604-620-1111\nM : develop.hiroshi@gmail.com\n============";

	if (mb_send_mail($to, "Your Burger Vacarion Password", $message, "From: develop.hiroshi@gmail.com")) {
		echo '0'.','.'Success. Check your email.';
	}else{
		echo '1'.','.'Error.. Please try again, or call 604-620-1111';
	}
}catch(PDOException $e){
	header('Content-Type: text/plain; charset=UTF-8', true, 500);
	exit($e->getMessage());
}



?>
