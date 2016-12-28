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
	$message = "Hi ".$dataFetch['userName'].".<br/><br/>Your password is ".$dataFetch['password'].".<br/><br/>If you have further questions, feel free to ask us.<br/><br/>Thank you.<br/<br/>Sincerely,<br/>Burger Vacation<br/><br>============<br/>T : 604-620-1111<br/>M : develop.hiroshi@gmail.com<br/>============";

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
