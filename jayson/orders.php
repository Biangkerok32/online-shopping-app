 <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>


<style type="text/css">
	.adding-label{
		float: left;
		clear: left;
		position: relative;
		width: 120px;
	}
	.label-margin{
		position: relative;
		margin-bottom: 10px;
	}
	.input-control{
		width: 300px;

	}
	</style>
<div id="products-body">
	
	<table id="tabledata" class="table table-bordered table-striped table-hover">
		<thead>
			
			<tr>
				<th>#</th>
				<th>Customer Name</th>
				<th>Mobile</th>
				<th>Delivery Address</th>
				<th>Items</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Date Ordered</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				include("connection.php");
				$connection = new connect();
				$connection = $connection->connecter();
				$q = "select * from ordered order by id desc";
				$exe = $connection->query($q);
				$count = 0;
				$price = 0;
				while ($row = mysqli_fetch_array($exe)) {
					$count += 1;
					$ds = $row['id'];
					$id = $row['customerID'];
					$q2 = "select * from customers where id = $id";
					$exe2 = $connection->query($q2);
					$row2 = mysqli_fetch_array($exe2);
					$name = ucfirst($row2['fname'])." ".ucfirst($row2['lname']);
					$code = $row['trackingCode'];
					$items = $row['para1'];
					$quants = $row['para2'];
					$dateOrdered = $row['dateOrdered'];
					$sold = $row['sold'];
					$price = $row['price'];
					$q3 = "select * from orderdetails where customers_id = $id";
					$exe3 = $connection->query($q3);
					$row3 = mysqli_fetch_array($exe3);
					$mobile  = $row3['mobile'];
					$completeAddress = $row3['completeAddress'];
					echo "
					<tr id='t$ds'>
					<td>$count</td>
					<td>$name</td>
					<td>$mobile</td>
					<td style='max-width: 120px;word-break: break-word;'>$completeAddress</td>
					<td style='max-width: 120px;word-break: break-word;'>$items</td>
					<td>$quants</td>
					<td id='pricer'>$price</td>
					<td>$dateOrdered</td>
					
					<td class='actions' id= '$id'>
					";
					if($sold == 0){
						echo "<button class='btn btn-success' id='$ds'>Delivered</button><button class='btn btn-danger' id='$ds'><i class='fa fa-trash'></i></button><span class='text text-success' style='display: none'><strong>Delivered</strong></span>";
					}else{
						echo "<span class='text text-success' style='display: block'>Delivered</span>";
					}
					

					echo"
					</td>
					</tr>
					";
				}

			?>
			

		</tbody>
		

	</table>
	</div>

	<script type="text/javascript">
		$(function(){
			$("#tabledata").dataTable()
			$(".actions button").click(function(){
					var index = $(this).index()
					if(index == 0){
						var con = confirm("Are you sure?")
						if(con == true){
							var id = parseInt($(this).attr("id"))
							var el = this
							var elTmp = $(this)
							var ell = el.parentElement.parentElement

							el = el.parentElement.getAttribute("id")
							var pricer = ell.children[6].innerHTML
							
							el = parseInt(el.toString().trim())
							$.post("deleveredQuery.php",{x: id,customerID: el,price: pricer},function(data){
								data = data.toString().trim()
								alert(data)
								if(data == "success"){
									elTmp.fadeOut(200)
									elTmp.next().fadeOut(200)
									elTmp.next().next().fadeIn(200)
								}
							})
						}
						if(con){

						}
					}else{
						var con = confirm("Are you sure to cancel order? ")
						if(con == true){
							var id = parseInt($(this).attr("id"))
							var el = $(this)
							$.post("cancelOrderQuery.php",{x: id},function(data){
								
								if(data == "success"){
									$("#t"+id).remove()
								}
							})
						}
						
					}
			})
			

		})
	</script>