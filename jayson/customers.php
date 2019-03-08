 <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>

<style type="text/css">
	#wallet{
		position: absolute;
		z-index: 999999;
	}
</style>
	<div id="customers">
		<table id="tabledata" class="table table-bordered table-striped table-hover">
		<thead>
			
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Mobile #</th>
		
				<th>Address</th>
				<th>Birthdate</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Username</th>
				<th>Password</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				include("connection.php");
				$connection = new connect();
				$connection = $connection->connecter();
				
				$count = 0;
				$q = "select * from customers order by id desc";
				$exe = $connection->query($q);
				while ($row = mysqli_fetch_array($exe)) {
					$count += 1;
					$fname = ucfirst($row['fname']);
					$lname = ucfirst($row['lname']);
					$mobile = $row['mobile'];
					$address = ucfirst($row['address']);
					$gender = $row['gender'];
					$birthdate = $row['birthdate'];
					$email = $row['email'];
					$username = $row['username'];
					$password = $row['password'];
					$id = $row['id'];
					echo "
					<tr>
					<td>$count</td>
					<td>$fname</td>
					<td>$lname</td>
					<td>$mobile</td>
					<td>$address</td>
					<td>$birthdate</td>
					<td>$gender</td>
					<td>$email</td>
					<td>$username</td>
					<td>$password</td>
					<td><button id='$id' class='btn btn-danger'><i class='fa fa-trash'></i></button><button id='$id' class='btn btn-success' data-toggle='modal' data-target='#wallet'><i class='fa fa-plus'></i>Top up wallet</button>
						<button id='$id' class='btn btn-primary' data-toggle='modal' data-target='#wallethistory'><i class='fa fa-globe'></i>Wallet History</button>
						<button id='$id' class='btn btn-primary' data-toggle='modal' data-target='#paymenthistory'><i class='fa fa-globe'></i>Payment History</button>
					</td>
					</tr>
					";
				}

			?>
			

		</tbody>
		

	</table>


	</div>
	<div class="modal fade" id="wallet">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<span style="font-size: 25px;">Top up wallet</span>
			<span style="cursor: pointer;font-size: 30px;" data-dismiss="modal">&times</span>
		</div>
		<div class="modal-body">

			<form action="#" action="POST" id="walletsub">
				<div class="input-group">
				<input type="number" class="form-control" id="walletval" name="wallet" required>
				<input type="submit" class="btn btn-primary" value="Add" name="">
			</div>

			</form>
		</div>
		
	</div>
</div>
</div>



<div class="modal fade" id="wallethistory">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<span style="font-size: 25px;">Wallet History</span>
			<span style="cursor: pointer;font-size: 30px;" data-dismiss="modal">&times</span>
		</div>
		<div class="modal-body" id="wallethistorybody">

			
		</div>
		
	</div>
</div>
</div>

<div class="modal fade" role="dialog" id="paymenthistory">
	<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<span style="font-size: 25px;">Payment History</span>
			<span style="cursor: pointer;font-size: 30px;" data-dismiss="modal">&times</span>
		</div>
		<div class="modal-body" id="paymenthistorybody">

			
		</div>
		
	</div>
</div>
</div>
	<script type="text/javascript">
		$(function(){
			$("#tabledata").dataTable()
			$("#wallet").appendTo("body")
			$("#wallethistory").appendTo("body")
			$("#paymenthistory").appendTo("body")
			$("#tabledata button").click(function(){
				var index = $(this).index()
				c = $(this).attr("id")
				if(index == 0){
					var con = confirm("Are you sure?")
					if(con == true){
					
						$.post("delCustomerQuery.php",{x: c},function(data){
							alert(data)
							$("#admin-body").load("customers.php")
						})
					}
				}else if(index == 2){
				
					$.post("wallethistory.php",{id: c},function(data){
						$("#wallethistorybody").html(data)
					})
				}else if(index == 3){
					$.post("paymenthistory.php",{id: c},function(data){
						$("#paymenthistorybody").html(data)
					})
				}

				else{

				}
				
			})



			$("#walletsub").submit(function(e){
				e.preventDefault()
				var val = $("#walletval").val()
				$.post("wallet.php",{id: c,val: val},function(datas){
					alert(datas)
				})
			})

		})

	</script>