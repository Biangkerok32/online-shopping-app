<?php
if(!empty($_POST['username']) && !empty($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	include("connection.php");
	$connection = new connect();
	$connection = $connection->connecter();
	$q = "select * from admin where username = '".$username."' && password = '".$password."'";
	$exe = $connection->query($q);
	$num = $exe->num_rows;
	if($num > 0){
		session_start();
		$_SESSION['admin'] = 'admin';
		header("location: admin.php");
		
	}else{
		header("location: index.php");
	}

}else{
echo "failed";
}

?>