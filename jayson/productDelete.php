<?php
include("connection.php");
$connection = new connect();
$connection = $connection->connecter();

if(!empty($_POST['id'])){
	$id = $_POST['id'];
	$q = "update products set sell = 0 where id = $id";
	$exe = $connection->query($q);
	if($exe){
		echo "successful";
	}else{
		echo "failed";
	}
}

?>