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
		padding: 3px;

	}
	.table-bordered button{
		margin-bottom: 3px;
	}
	</style>

<?php
			$name = "";  
			if(isset($_POST['name'])){
				$name = $_POST['name'];
			}
?>
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
					<span style="font-size: 22px;"><i class="fa fa-plus-circle"></i><i class="fa fa-pencil"></i> Edit Product</span>
				</div>
				<div class="modal-body" id="editBody">
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="sell">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Selling products</h3>
				</div>
				<div class="modal-body">
					<form action="#" method="POST" id="sellSub">
						
							<input type="number" name="ids" id="idSell" style="display: none;">

						
						<div class="breaker">
							<label>Quantity:</label>
							<input type="number" style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%; margin-bottom: 20px;" name="stocks" required>
						</div>
						<input type="submit" class="btn btn-primary" value="Done" name="sub">
					</form>
				</div>
				<div class="modal-footer">
					<a class="close" href="#" data-dismiss="modal">&times</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="stockings">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3><i class="fa fa-plus"></i> Adding Stocks</h3>
				</div>
				<div class="modal-body">
					<form action="#" id="stockings_add">
						<input type="number" style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%;margin-bottom: 20px;" id="stocksnum" name="stocks" placeholder="# of stocks to be added" style="width: 400px;">
						<input type="submit" class="btn btn-primary"  name="done">

						
					</form>
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
					<span style="font-size: 22px;"><i class="fa fa-plus-circle"></i> Adding Product</span>
					<span style="cursor: pointer;font-size: 30px;" data-dismiss="modal">&times</span>
				</div>
				<div class="modal-body">
					<form action="addProductQuery.php" id="addingProduct" method="POST" enctype="multipart/form-data">
						<input type="file" name="images[]" multiple required /><br />
						<div class="label-margin">
						<nav class="adding-label">Product Date: </nav><input style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" type="date" name="products-date" class="input-control" required />
					</div><div class="label-margin">
						<nav class="adding-label">Product Name: </nav><input style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" type="text" placeholder="Product Name" name="products-name" class="input-control" required=""></div>
						<div class="label-margin">
							<nav class="adding-label">Product Description: </nav><textarea style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" rows="5" class="input-control" id="input-control-textarea" name="products-discription" required ></textarea>
						</div>
						<div class="label-margin">
							<nav class="adding-label">Product Price: </nav><input style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" type="number" name="price" class="input-control" required >
						</div>
						<div class="label-margin">
							<nav class="adding-label">Product Stocks</nav><input style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" type="number" name="stocks" class="input-control" required />
						</div>
						<div class="label-margin">
							<nav class="adding-label">Source</nav><input style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" type="text" id="suppliers" name="suppliers"  class="input-control" value="<?php echo $name; ?>" required disabled />
						</div>

						<div class="label-margin">
							<select style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%;display: none;" class="input-control" name="type" required >
								
								<option selected>Product</option>
							

							</select>
						</div>
						<div class="label-margin">
							<input type="submit" class="btn btn-primary" style="position: relative;left: 20px;margin-top: 20px;" value="Done" name="">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>
	<button class="btn btn-primary" style="margin-bottom: 10px;" data-toggle="modal" data-target="#adding"><i class="fa fa-plus"></i> Add product</button>
	<button class="btn btn-default" style="margin-bottom: 10px;" id="gback">Go back</button>
	<table id="tabledata" class="table table-bordered table-striped table-hover">
		<thead>
			
			<tr>
				<th>#</th>
				<th>Date</th>
				<th>Product Name</th>		
				<th>Price</th>
				
				<th>Source</th>
			
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
				include("connection.php");
				$connection = new connect();
				$connection = $connection->connecter();
				$q = "select * from products where supplier = '$name' order by id desc";
				$exe = $connection->query($q);
				$count = 0;
				while ($row = mysqli_fetch_array($exe)) {
					$count += 1;
					$date = $row['product_date'];
					$id = $row['id'];
					$name = $row['name'];
					$description = $row['discription'];
					
					$supplier = $row['supplier'];
					$price = $row['price'];
					$type = $row['type'];
					echo "<tr>
					<td>$count</td>
					<td>$date</td>
					<td id='n$id'>$name</td>
				
					<td>$price</td>
				
					<td>$supplier</td>
					
					<td class='actionButton'><button class='btn btn-info' data-toggle='modal' data-target='#editPro' id='$id'>Edit</button><button class='btn btn-info' id='$id'>Delete</button>
					<button class='btn btn-info' id='$id' data-toggle='modal' data-target='#view-product'>info</button>
					<button class='btn btn-info' id='$id' data-toggle='modal' data-target='#sell'>Sell</button>
					<button class='btn btn-info' id='$id' data-toggle='modal' data-target='#stockings'>Add Stocks</button>
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
			var d = 0;
			$("#view-product").appendTo("body")
			$("#editPro").appendTo("body")
			$("#sell").appendTo("body")
			$("#stockings").appendTo("body")
			$("#adding").appendTo("body")


			$(".actionButton button").click(function(){
				var index = $(this).index()
				if(index == 1){

					var child = $(this).attr("id")
					
					var con = confirm("Are you sure?")
					if(con == true){
						$.post("prodel.php",{id: child},function(data){
							
							if(data == "successful"){
							$.post("admin-products.php",{name: $("#suppliers").val()},function(datas){
								$("#admin-body").html(datas)
							})
							}else{
							alert("Error Occured!!")
							}
						})
					}
				}else if(index == 0){
					
					var id = $(this).attr("id")
					id = parseInt(id)
					$.post("proEdit.php",{x: id},function(data){
						$("#editBody").html(data)
					})


				}else if(index == 3){
					var id = $(this).attr("id")
					$("#idSell").val(parseInt(id))


				}else if(index == 4){
					var id = $(this).attr("id")
					d = id;
					
				}

				else{
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

			$("#stockings_add").submit(function(e){
				e.preventDefault()
				alert(d) 
				$.post("stockings.php",{id: d, num: $("#stocksnum").val()},function(data){
						if(data == "successful"){
							alert("success")
						}else{
							alert(data)
						}
					})

			})

			$("#sellSub").submit(function(e){
				e.preventDefault()
				var ndata = new FormData(this)
				$.ajax({
					url: "sellQuery.php",
					method: "POST",
					data: ndata,
					processData: false,
					contentType: false,
					success: function(e){
						alert(e)
					}
				})
			})
			$("#addingProduct").submit(function(e){
				e.preventDefault()
				var ndata = new FormData(this)
				ndata.append("suppliers",$("#suppliers").val())
				$.ajax({
					url: "addProductQuery.php",
					method: "POST",
					data: ndata,
					processData: false,
					contentType: false,
					success: function(data){
						alert(data)
						if(data == "successful"){
							$("#admin-body").load("admin-products.php")
						}
					}
				})

			})
			$("#gback").click(function(){
				$("#admin-body").load("supplier.php")
			})



		})
	</script>