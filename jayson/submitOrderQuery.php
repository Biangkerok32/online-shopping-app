<?php
session_start();
$customerID = $_SESSION['customerID'];
if(isset($customerID)){
	if(!empty($_POST['x1']) && !empty($_POST['x2']) && !empty($_POST['codes']) && !empty($_POST['totalds']) && !empty($_POST['price'])){
		$para1 = $_POST['x1'];
		$para2 = $_POST['x2'];
		$code = $_POST['codes'];
		$totalds = $_POST['totalds'];
		$totalPrice = $_POST['price'];
		include("connection.php");
		$connection = new connect();
		$connection = $connection->connecter();
		$ds = explode("-", $totalds);
		$quant = explode(",", $para2);
		$passed = false;
		
		for ($i=0; $i < sizeof($quant); $i++) { 
			$q = "update orders set quantity = ".$quant[$i]." where id = ".$ds[$i];

			$exe = $connection->query($q);
			if($exe) {$passed = true;
				$q = "select * from orders where id = ".$ds[$i];
				$exe = $connection->query($q);
				$row = mysqli_fetch_array($exe);
				$proID = $row['productID'];
				$q = "select * from products where id = ".$proID;
				$exe = $connection->query($q);
				$row = mysqli_fetch_array($exe);
				$sellingStocks = $row['sellingStocks'];
				$tmp = (intval($sellingStocks) - intval($quant[$i]));
				$q = "update products set sellingStocks = $tmp where id = $proID";
				$exe = $connection->query($q);

			}
			else{
				$passed = false;
				$i = sizeof($ds) + 1;
			}

		}
		if($passed == true){
			$q = "insert into ordered(customerID,trackingCode,para1,para2,price,dateOrdered) values('".$customerID."','".$code."','".$para1."','".$para2."','".$totalPrice."','".date("Y-m-d")."')";
			$exe = $connection->query($q);
		
			if($exe){
			echo "success";
			}else{
			echo "failed!";
			}
		}

		
	}else{
		echo "failed!";
	}
	
}


?>