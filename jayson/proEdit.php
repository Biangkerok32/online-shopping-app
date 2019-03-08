<style type="text/css">
	


</style>
<?php
		include("connection.php");
		$connection = new connect();
		$connection = $connection->connecter();

		$proDate = date("Y-m-d");
		$proName = "";
		$proDescription = "";
		$proPrice = "";
		$proStocks = 0;
		$proSupplier = ""; 
		$id = 0;
		if(!empty($_POST['x'])){
			$id = $_POST['x'];
			$q = "select * from products where id = $id";
			$exe = $connection->query($q);
			$row = mysqli_fetch_array($exe);
			$proDate = $row['product_date'];
			$proName = $row['name'];
			$proDescription = $row['discription'];
			$proPrice = $row['price'];
			$proStocks = $row['sellingStocks'];
			$proSupplier = $row['supplier'];

		}
		

?>
<form action="addProductQuery.php" id="EditProduct" method="POST" enctype="multipart/form-data">
						
						<div class="label-margin">
						<nav class="adding-label">Product Date: </nav><input style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" type="date" value="<?php echo $proDate; ?>" name="products-date" class="input-control" required />
					</div><div class="label-margin">
						<nav class="adding-label">Product Name: </nav><input style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" type="text" placeholder="Product Name" value="<?php echo $proName; ?>" name="products-name" class="input-control" required=""></div>
						<div class="label-margin">
							<nav class="adding-label">Product Description: </nav><textarea style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" rows="5" class="input-control" id="input-control-textarea" name="products-discription" required ><?php echo $proDescription; ?></textarea>
						</div>
						<div class="label-margin">
							<nav class="adding-label">Product Price: </nav><input style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" type="number" value="<?php echo $proPrice; ?>" name="price" class="input-control" required >
						</div>
						<div class="label-margin">
							<nav class="adding-label">Product Stocks</nav><input style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" type="number" value="<?php echo $proStocks; ?>" name="stocks" class="input-control" required />
						</div>
						<div class="label-margin">
							<nav class="adding-label">Product Supplier</nav><input style="border: none;outline: none;border-bottom: 1px solid #888;width: 100%" type="text" name="supplier"  value="<?php echo $proSupplier; ?>"   class="input-control" disabled />
						</div>
						<div class="label-margin">
							<input type="submit" class="btn btn-primary" style="position: relative;left: 20px;margin-top: 20px;" value="Done" name="">
						</div>

					
					</form>
					<script type="text/javascript">
						$(function(){
							$("#EditProduct").submit(function(e){
								e.preventDefault()
								var id = <?php echo $id; ?>;
								var fdata = new FormData(this)
								fdata.append("x",id)
								$.ajax({
									url: "proEditQuery.php",
									method: "POST",
									data: fdata,
									processData: false,
									contentType: false,
									success: function(data){
										alert(data)
									}
								})

							})
						})
					</script>