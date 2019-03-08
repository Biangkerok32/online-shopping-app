<?php
if(isset($_POST['x'])){
$id = $_POST['x'];
			include("connection.php");
			$connection = new connect();
			$connection = $connection->connecter();

			$q = "delete from supplier where id = $id";
			$exe = $connection->query($q);
			if($exe){
				echo "successful";
			}else{
				echo "error Occured";
			}

}else{
	echo "Error Occured";
}



?>