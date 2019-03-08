<?php
include("connection.php");
$connection = new connect();
$connection = $connection->connecter();

if(!empty($_POST['id']) && !empty($_POST['num'])){
	$id = $_POST['id'];

	$q = "select * from products where id = $id";
	$exe = $connection->query($q);
	$row = mysqli_fetch_array($exe);
	$st = intval($row['sellingStocks']) + intval($_POST['num']);
	$q = "update products set sellingStocks = $st where id = $id";
	$exe = $connection->query($q);
	if($exe){
		echo "successful";
	}else{
		echo "failed";
	}
}else{
	echo "awdawd";
}

?>