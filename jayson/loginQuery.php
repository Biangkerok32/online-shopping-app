<?php
if(!empty($_POST['username']) && !empty($_POST['password'])){
	include("connection.php");
	$connection = new connect();
	$connection = $connection->connecter();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$q = "select * from customers where username = '".$username."' && password = '".$password."'";
	$exe = $connection->query($q);
	$row = mysqli_fetch_array($exe);
	$id = $row['id'];
	$num = $exe->num_rows;
	if($num >= 1){
		session_start();
		$_SESSION['customer'] = $username;
		$_SESSION['customerID'] = $id;
		echo "success";
	}else{
		echo "username or password is invalid";
	}
}

?>