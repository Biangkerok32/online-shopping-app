<?php
if(!empty($_POST['flname']) && !empty($_POST['mobile']) && !empty($_POST['province']) && !empty($_POST['candm']) && !empty($_POST['barangay']) && $_POST['completeAddress']){
	session_start();
	$id = $_SESSION['customerID'];
	$flname = $_POST['flname'];
	$mobile = $_POST['mobile'];
	$province = $_POST['province'];
	$candm = $_POST['candm'];
	$barangay = $_POST['barangay'];
	$completeAddress = $_POST['completeAddress'];
	include("connection.php");
	$connection = new connect();
	$connection = $connection->connecter();
	$q = "insert into orderdetails(customers_id,flname,mobile,province,candm,barangay,completeAddress) values('".$id."','".$flname."','".$mobile."','".$province."','".$candm."','".$barangay."','".$completeAddress."')";
	$exe = $connection->query($q);
	if ($exe) {
		echo "success";
	}else{
		echo "failed!";
	}


}

?>