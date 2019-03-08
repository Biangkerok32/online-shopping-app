<style type="text/css">
	#main-img{
		max-width: 100%;
		height: auto;
		display: block;
		margin: auto;
	}
	#product-description{
		float: left;
		clear: left;
		width: 100%;
		padding: 10px;
		
		position: relative;
		margin-top: 10px;
		text-indent: 20px;
		border-radius: 5px;
		font-size: 20px;
		word-break: break-all;
	}
	#product-date{
		color: #888;
		clear: left;
		position: relative;
		float: left;
		font-size: 13px;
	}
	#product-stock{
		float: left;
		position: relative;
		clear: left;

	}
	#product-price{
		position: relative;
		float: left;
		clear: left;
		font-size: 23px;
		color: #333;
	}
	.product-cart{
		float: left;
		clear: left;
		position: relative;
		width: 100%;
		height: 30px;
		text-align: center;
		background-color: #333;
		
		
		color: #f5f5f5;
		cursor: pointer;
	}
	.product-cart:hover{
		background-color: #888;
		transition: background 0.5s;
	}
	.type{
		font-style: italic;
		color: #8B2323;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$(".product-cart").click(function(){

			<?php
			session_start();
			if(isset($_SESSION['customer'])) $customer = $_SESSION['customer'];
			if(isset($customer)){
				echo "var allow = '$customer';";	
			}else{
				echo "var allow = '';";
			}
			?>
			if(allow == ''){
				alert("you must log in first!")
			}else{				
				var ds = $(this).attr("id")
				$.post("cartQuery.php",{x: ds},function(data){
					
					if(data == "success"){
						$("#cartSuccess").fadeIn(200)
					}else{
						alert(data)
					}
					
				})				
			}


		})
	})
</script>
<?php

if(!empty($_POST['x'])){
	include("connection.php");
	$connection = new connect();
	$connection = $connection->connecter();
	$id = $_POST['x'];
	$q = "select * from products where id=$id";
	$exe = $connection->query($q);
	while ($row = mysqli_fetch_array($exe)) {
		$ds = $row['id'];
		$q2 = "select * from images where product_id = $ds";
		$exe2 = $connection->query($q2);
		$description = $row['discription'];
		$stock = $row['sellingStocks'];
		$price = $row['price'];
		$date = $row['product_date'];
		$type = $row['type'];

		while ($row2 = mysqli_fetch_array($exe2)) {
			$name = $row2['name'];
			echo "<img src='images/$name' id='main-img' / >";
		}
		echo "
		<p id='product-description'>$description</p>
		<p id='product-price'>P $price</p>
		<p id='product-stock'>$stock stocks left</p>
		
<p id='product-date'>$date</p>
<nav class='product-cart' id='$ds'>Add to cart</nav>


		";
	}
}

?>
<div class="alert alert-success" id="cartSuccess" style="float: left;display: none;clear: left;margin-top: 20px;width: 100%;">
	<span><strong>Added to cart!</strong></span>
</div>

