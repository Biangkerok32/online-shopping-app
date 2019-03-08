<?php


include("connection.php");
				$connection = new connect();
				$connection = $connection->connecter();
					if(!empty($_POST['x'])){
						$id = $_POST['x'];

						$q = "delete from ordered where id = $id";

						$exe = $connection->query($q);
						if($exe){
							echo "success";
						}

					}

				



?>