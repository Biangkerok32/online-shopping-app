 <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>

<style type="text/css">
	.breaker{
		float: left;
		clear: left;
		position: relative;
		width: 100%;
		height: auto;
		overflow: hidden;
		margin-bottom: 10px;
	}
	.breaker label{
		width: 150px;
	}
	.breaker input[type='text']{
		width: 200px;
	}
	.input-controler{
		border: none;
		display: none;
	}
</style>
<div class="modal fade" id="addSup">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3><i class="fa fa-plus fa-2x"></i></h3>
			</div>
			<div class="modal-body">


				<form action="supplierQuery.php" id="subSup" method="POST">
				<div class="breaker">
					<label>Source Name</label>
					<input type="text" name="supplierName" style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" class="input-control" required>
				</div>
				<div class="breaker">
					<label>Address</label>
					<input type="text" name="address" style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" class="input-control" required>
				</div>
				<div class="breaker">
					<label>Contact</label>
					<input type="text" name="contact" style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" class="input-control" required>
				</div>
				<div class="breaker">
					<label>Date Effective</label>
					<input type="date" name="dateE" style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" class="input-control" required>
				</div>
				<input type="submit" name="submit" value="done"  class="btn btn-primary">
				</form>

			</div>
			<div class="modal-footer">
			</div>
		</div>

	</div>
</div>

<div id="supplierContainer" class="container">
	<button class="btn btn-primary" data-toggle='modal' data-target='#addSup'><i class="fa fa-plus"></i> Add Source</button>

		<table id="tabledata" class="table table-bordered table-striped table-hover">
		<thead>
			
			<tr>
				<th>#</th>
				<th>Source Name</th>
				<th>Address</th>		
				<th>Contact No.</th>
				<th>Date Effective</th>
				<th>Actions</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
		include("connection.php");
		$connection = new connect();
		$connection = $connection->connecter();
			$q = "select * from supplier order by id desc";
			$exe = $connection->query($q);
			$count = 0;
			while ($row = mysqli_fetch_array($exe)) {
				$supplierName = $row['supplierName'];
				$address = $row['address'];
				$contact = $row['contact'];
				$dateE = $row['dateE'];
				$id = $row['id'];

				echo "
				<tr>
				<td>$count</td>
				<td id='s$id'>$supplierName</td>
				<td>$address</td>
				<td>$contact</td>
				<td>$dateE</td>
				<td><button class='btn btn-secondary' id='$id'>View Product(s)</button>
				<button class='btn btn-danger' id='$id'><i class='fa fa-trash'></i> Delete</button>
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

		$("#addSup").appendTo("body")
		$("#subSup").submit(function(e){
			e.preventDefault()
			var x = new FormData(this)
			$.ajax({
				url: "supplierQuery.php",
				method: "POST",
				data: x,
				processData: false,
				contentType: false,
				success: function(data){
					alert(data)
				}
			})
		})

		$("#tabledata button").click(function(){
			var index = $(this).index()
			var id = $(this).attr("id")
				var name = $("#s"+id).html()
			if(index == 0){
				
				name = name.toString().trim()

					$.post("admin-products.php",{x: id,name: name},function(e){
					$("#admin-body").html(e)
				})
			}else{ 
				
				var con = confirm("are you sure?")
				if(con == true){
					$.post("delSupplier.php",{x: id},function(e){
					alert(e)
						if(e == "successful"){
						$("#admin-body").load("supplier.php")
						}
					})
				}
				
			}
			
		})
	})
</script>