<?php
if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm']) && !empty($_POST['mnumber']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['birthdate']) && !empty($_POST['gender'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	$mnumber = $_POST['mnumber'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$birthdate = $_POST['birthdate'];
	$gender = $_POST['gender'];

	if($password == $confirm){
		include("connection.php");
		$connection = new connect();
		$connection = $connection->connecter();
		$q = "select username from customers where username = '".$username."'";

		$exe = $connection->query($q);
		$num = $exe->num_rows;
		
		if($num == 0){

		$q = "insert into customers(fname,lname,username,password,mobile,email,address,birthdate,gender) values('".$fname."','".$lname."','".$username."','".$password."','".$mnumber."','".$email."','".$address."','".$birthdate."','".$gender."')";
		$exe = $connection->query($q);
		if($exe) echo "success"; 

		}else echo "Username already exist";


	}else echo "Password Does not matched!"; ;
}

?>