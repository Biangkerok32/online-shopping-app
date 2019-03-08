<?php
		include("connection.php");
		$connection = new connect();
		$connection = $connection->connecter();
		if(!empty($_POST['supplierName']) && !empty($_POST['address']) && !empty($_POST['contact']) && !empty($_POST['dateE'])){
			$supplierName = $_POST['supplierName'];
			$address = $_POST['address'];
			$contact = $_POST['contact'];
			$dateE = $_POST['dateE'];
			$q = "select supplierName from supplier where supplierName = '$supplierName'";
			$exe = $connection->query($q);
			if($exe->num_rows == 0){
				$q = "insert into supplier(supplierName,address,contact,dateE) values('$supplierName','$address','$contact','$dateE')";
				$exe = $connection->query($q);
				if($exe){
				echo "success";
				}else{
				echo "error occured!";
				}
			}else{
				echo "Supplier Name Already Exist";
			}

			
		}



?>