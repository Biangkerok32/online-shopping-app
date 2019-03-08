<script type="text/javascript">
	$(function(){
		$(".item-holder").hover(function(){
			var x = $(this).find(".view-product")
			x.fadeToggle(100)
			
		})
	})
</script>


<style type="text/css">
	#item-sec{
		width: 100%;
		position: relative;
		clear: both;
		height: auto;
		overflow: hidden;

	}
	
	.item-holder{
		width: 23%;
		cursor: pointer;
		clear: none;
		float: left;
		height: 280px;
		overflow: hidden;

		padding: 5px;
		margin-right: 1%;

		padding-bottom: 20px;
		border: 1px solid #dedede;
		position: relative;
		background-color: #fff;
		border-radius: 5px;
		margin-bottom: 10px;
	}
	.item-holder img{
		display: block;
		max-width: 100%;
		max-height: 150px;

		margin: auto;
	}
	.product-head{
		font-size: 23px;
		color: #4949dd;
		clear: both;
		position: relative;
		text-align: center;
		margin-top: 10px;
		width: 100%;

	}
	.product-price{
		color: #292929;
		font-size: 25px;
	}
	.view-product{
		width: 100%;
		height: 100%;
		clear: both;
		position: absolute;
		float: none;
		text-align: center;
		color: #f5f5f5;
		left: 0px;
		padding: 3px;
		top: 0px;
		display: none;
		background-color: #292929;
		transition: all 0.5s;
		

	}
	.fa-eye{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
	}
	
	#product-title{
		font-size: 23px;
		position: relative;
		clear: both;
		color: #4949dd;

	}
	.type{
		float: left;
		clear: left;
		position: relative;

	}
	.type span{
		font-style: italic;
		color: #8B2323;
	}
	.viewer{
		font-size: 40px;
		position: relative;
		display: block;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
	}
	
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$(".view-product").click(function(){
			var x = this.parentElement.children[1].innerHTML
			$("#product-title").html(x)
			var id = $(this).attr("id")
			$.post("view-product.php",{x: id},function(data){
				$("#product-body").html(data)
			})

		})
	})
</script>
<?php
session_start();


?>
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

<div id="item-sec">

	<?php
	include("connection.php");
	$connection = new connect();
	$connection = $connection->connecter();
	$q = "select * from products where sell = 1 || supplier = 'services' order by id desc";
	$exe = $connection->query($q);
	while ($row = mysqli_fetch_array($exe)) {
		$title = $row['name'];
		$price = $row['price'];
		$type = $row['type'];

		echo "<div class='item-holder'>			
		";
		$id = $row['id'];
		$q2 = "select * from images where product_id = $id order by id desc";
		$img_name = "";
		$exe2 = $connection->query($q2);
		while ($row2 = mysqli_fetch_array($exe2)) {
					$img_name = $row2['name'];

		}
		echo"
		<img src='images/$img_name' />
		<div class='product-head'>$title</div>
		<div class='product-price'>P $price</div>
		<nav class='view-product' id='$id' data-toggle ='modal' data-target='#view-product'><span class='viewer'>View More</span></nav>
		</div>
		";
	}

	?>

	


	
	
	<style type="text/css">
		.sec{
			width: 30%;
			height: auto;
			position: relative;
			
			padding: 30px;
			float: left;
			margin-right: 2%;
			border: none;
			height: 500px;
			background-image: linear-gradient(to bottom, #fff, #A8A8A8);

		}
		@media screen and (max-width: 600px) {
  			.item-holder{
  				width: 45%;
  			}
  			#item-sec{
  				padding-left: 5%;
  			
  			} 
		}
	</style>
	</div>
	
	<style type="text/css">
		#carousels img{
			width: 100%;
		}
	</style>
	

