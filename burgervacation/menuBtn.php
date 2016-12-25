<?php

require "../../mysql.php";

$order = $_POST['order'];
try{
	$selectSql = "SELECT * FROM ".$order['genre']." WHERE name='".$order['menu']."'";
	error_log($selectSql);
	$data = $pdo->query($selectSql);
	$dataFetch = $data->fetch();
	echo $dataFetch['price'].",".$dataFetch['url'].",".$order['menu'];
}catch(PDOException $e){
	header('Content-Type: text/plain; charset=UTF-8', true, 500);
	exit($e->getMessage());
}



?>
