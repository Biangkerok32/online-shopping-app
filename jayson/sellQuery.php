<?php
include("connection.php");
		$connection = new connect();
		$connection = $connection->connecter();

		if(isset($_POST['ids']) && isset($_POST['stocks'])){
			$id = $_POST['ids'];
			$stocks = $_POST['stocks'];
			$q = "update products set sell = 1 where id = $id";
			$exe = $connection->query($q);
			if($exe){
				

				$q = "update products set sellingStocks = $stocks where id = $id";
				$exe = $connection->query($q);
				if($exe){
					echo "success";
				}else{
					echo "Error Occured!1";
				}
			}else{
				echo "Error Occured!2";
			}

		}else{
			echo "Error Occured!3";
		}
?>