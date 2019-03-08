<?php
if(!empty($_POST['x'])){
	session_start();
	if(isset($_SESSION['customer'])){
		$customer = $_SESSION['customer'];
		$productID = $_POST['x'];
		$customerID = $_SESSION['customerID'];
		include("connection.php");
		$connection = new connect();
		$connection = $connection->connecter();
		$quantity = 1;
		$sold = false;

		$q = "select * from ordered where customerID = $customerID";
		$exe = $connection->query($q);
		$solder = true;
		while ($row = mysqli_fetch_array($exe)) {
			$solder = $row['sold'];
		}
		if($exe->num_rows > 1 && $solder == false){
			echo "You still have pending order";
		}else{
			$q = "insert into orders(customers_id,productID,quantity,sold) values('".$customerID."','".$productID."','".$quantity."','".$sold."')";
			$exe = $connection->query($q);
			if($exe)echo "success";
		}

		


	}else{
		echo "failed";
	}
}

?>