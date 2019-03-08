<?php
include("connection.php");
$connection = new connect();
				$connection = $connection->connecter();
				if(!empty($_POST['id']) && !empty($_POST['val'])){
					date_default_timezone_set("Asia/Manila");
					$id = $_POST['id'];
					$val = $_POST['val'];
					$q = "insert into wallet(customer_id,wallet,dater) values($id,$val,'".strval(date("Y-m-d h:i:s"))."')";
					$stm = $connection->prepare($q);
					$stm->execute();
				}else{
					echo "the numberfield cant be empty";
				}


?>