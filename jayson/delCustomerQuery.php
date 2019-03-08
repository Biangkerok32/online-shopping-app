<?php
if(!empty($_POST['x'])){
	$id = $_POST['x'];
				include("connection.php");
				$connection = new connect();
				$connection = $connection->connecter();
				$q = "delete from customers where id = $id";
				$exe = $connection->query($q);
				if($exe){
					echo "succes";
				}else{
					echo "error occured!";
				}
}

?>