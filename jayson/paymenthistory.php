<table class="table table-bordered table-striped table-hover">
	<thead>
		<th>#</th>
		<th>Wallet</th>
		<th>Date</th>
		

	</thead>
	<tbody>
		<?php

		if(!empty($_POST['id'])){

			$id = $_POST['id'];
			include("connection.php");
				$connection = new connect();
				$connection = $connection->connecter();
				$q = "select * from payment where customer_id = ".$id." order by id desc";
				$stm = $connection->query($q);
				
				$count = 0;
				while ($row = mysqli_fetch_array($stm)){
					$count+=1;
					echo "
					<tr>
						<td> $count </td>
						<td> ".$row['wallet']." </td>
						<td> ".$row['dater']." </td>

					</tr>
					";
				   
				}
		}else{
			echo "Error Occured";
		}
	

		?>
		
	</tbody>

</table>