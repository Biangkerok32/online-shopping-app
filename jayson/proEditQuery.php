<?php
if(!empty($_POST['x'])){
	$datess = $_POST['products-date'];
	$name = $_POST['products-name'];
	$description = $_POST['products-discription'];
	$price = $_POST['price'];
	$stocks = $_POST['stocks'];
	

	$id = $_POST['x'];
	include("connection.php");
		$connection = new connect();
		$connection = $connection->connecter();
		
		$q = "update products set product_date = '$datess' where id = $id";
		$exe = $connection->query($q);
		if($exe){
			$q = "update products set name = '$name' where id = $id";
			$exe = $connection->query($q);
			if($exe){
				$q = "update products set discription = '$description' where id = $id";
				$exe = $connection->query($q);
				if($exe){
					$q = "update products set price = $price where id = $id";
					$exe = $connection->query($q);
					if($exe){
						$q = "update products set sellingStocks = $stocks where id = $id";
						$exe = $connection->query($q);
						if($exe){
							
							echo "success";
						}else{
							echo "error occured!";
						}
					}else{
						echo "error occured!";
					}
				}else{
					echo "error occured !";
				}
			}else{
				echo "error occured!";
			}
		}else{
			echo "error occured!";
		}

}else{
	echo "failed";
}
?>