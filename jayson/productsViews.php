 <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>


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
		padding: 3px;

	}
	</style>

<div id="products-body">
	<div class="modal fade" id="view-product">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<span id="product-title"></span>
			<span style="cursor: pointer;font-size: 30px;" data-dismiss="modal">&times</span>
		</div>
		<div class="modal-body" id="product-body">
		</div>
		<div class="modal-footer">
			 
		</div>
	</div>
</div>
</div>

	<div class="modal fade" id="editPro">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<span style="font-size: 22px;"><i class="fa fa-plus-circle"></i> Edit Products</span>
				</div>
				<div class="modal-body" id="editBody">
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="adding">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<span style="font-size: 22px;"><i class="fa fa-plus-circle"></i> Adding Services</span>
				</div>
				<div class="modal-body">
					<form action="addProductQuery.php" id="addingProduct" method="POST" enctype="multipart/form-data">
						<input type="file" name="images[]" multiple required /><br />
						<div class="label-margin">
						<nav class="adding-label">Product Date: </nav><input type="date" name="products-date" class="input-control" required />
					</div><div class="label-margin">
						<nav class="adding-label">Product Name: </nav><input type="text" placeholder="Product Name" name="products-name" class="input-control" required=""></div>
						<div class="label-margin">
							<nav class="adding-label">Product Description: </nav><textarea rows="5" class="input-control" id="input-control-textarea" name="products-discription" required ></textarea>
						</div>
						<div class="label-margin">
							<nav class="adding-label">Product Price: </nav><input type="number" name="price" class="input-control" required >
						</div>
						<div class="label-margin">
							<nav class="adding-label">Product Stocks</nav><input type="number" name="stocks" class="input-control" required />
						</div>
						

						<div class="label-margin">
							<nav class="adding-label">Type: </nav><select class="input-control" name="type" required >
								<option disabled selected>Please Choose</option>
								<option>Product</option>
								

							</select>
						</div>
						<div class="label-margin">
							<input type="submit" class="btn btn-primary" style="position: relative;left: 20px;margin-top: 20px;" value="Upload" name="">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal">&times</button>
				</div>
			</div>
		</div>
	</div>

	<table id="tabledata" class="table table-bordered table-striped table-hover">
		<thead>
			
			<tr>
				<th>#</th>
				<th>Date</th>
				<th>Product Name</th>		
				<th>Price</th>
				<th>Stocks</th>
				<th>Source</th>
				<th>Type</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
				include("connection.php");
				$connection = new connect();
				$connection = $connection->connecter();
				$q = "select * from products where sell = 1 || supplier = 'services' order by id desc";
				$exe = $connection->query($q);
				$count = 0;
				while ($row = mysqli_fetch_array($exe)) {
					$count += 1;
					$date = $row['product_date'];
					$id = $row['id'];
					$name = $row['name'];
					$description = $row['discription'];
					$stocks = $row['sellingStocks'];
					$supplier = $row['supplier'];
					$price = $row['price'];
					$type = $row['type'];
					echo "<tr>
					<td>$count</td>
					<td>$date</td>
					<td id='n$id'>$name</td>
				
					<td>$price</td>
					<td>$stocks</td>
					<td>
					";
					if($supplier != "services"){
						echo "$supplier";
					}else{
						echo "NA";
					}
					

					echo "</td>
					<td>$type</td>
					<td class='actionButton'>
					";


if($supplier != "services"){
	echo "<button class='btn btn-danger' id='$id'><i class='fa fa-trash'></i></button>";
}
					
					echo "
					<button class='btn btn-info' id='$id' data-toggle='modal' data-target='#view-product'>info</button>
					</td>

					</tr>";
				}

			?>
			

		</tbody>
		

	</table>
	</div>

	<script type="text/javascript">
		$(function(){
			$("#tabledata").dataTable()
			$("#view-product").appendTo("body")
			$(".actionButton button").click(function(){
				var index = $(this).index()
				if(index == 0){
					var child = $(this).attr("id")
					var con = confirm("Are you sure?")
					if(con == true){
						$.post("productDelete.php",{id: child},function(data){
							if(data == "successful"){
							$("#admin-body").load("productsViews.php")
							}else{
							alert("Error Occured!!")
							}
						})
					}
				}else{
					var id = $(this).attr("id")
					id = parseInt(id)
					$.post("view-product.php",{x: id},function(data){
						var name = $('#n'+id).html()
					$("#product-body").html(data)
					$(".product-cart").css({display: "none"})
					$("#product-title").html("<span style='font-size: 22px;'>"+name+"</span>")

				})
				}
			})
			$("#addingProduct").submit(function(e){
				e.preventDefault()
				var ndata = new FormData(this)
				$.ajax({
					url: "addServices.php",
					method: "POST",
					data: ndata,
					processData: false,
					contentType: false,
					success: function(data){
						alert(data)
						if(data == "successful"){
							$("#admin-body").load("productsViews.php")
						}
					}
				})

			})



		})
	</script>