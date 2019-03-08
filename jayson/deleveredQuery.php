<?php
include("connection.php");
				$connection = new connect();
				$connection = $connection->connecter();
				session_start();

				
					if(!empty($_POST['x']) && !empty($_POST['customerID'])){
						$id = $_POST['x'];
						$customerID = $_POST['customerID'];
						$pricer = $_POST['price'];

						$q = "update ordered set sold = true where id = $id";

						$exe = $connection->query($q);
						$dates = strval(date("Y-m-d"));
						if($exe){
							$q = "update orders set sold = true where customers_id = $customerID";
							$exe = $connection->query($q);
							if($exe){
								$ds = 0;
								$q = "select * from ordered where customerID = $customerID";
								$exe = $connection->query($q);
								while ($row = mysqli_fetch_array($exe)) {
									$ds = $row['id'];								}


								$q = "update ordered set delevered = '".$dates."' where customerID = $customerID && id = $ds";
								
								$exe = $connection->query($q);
								if($exe){
									$q = "insert into payment(customer_id,wallet,dater) values($customerID,$pricer,'$dates')";
									$exe = $connection->query($q);
									if($exe){
									echo "success";
									}
								}
							}
						}

					}

				


?>