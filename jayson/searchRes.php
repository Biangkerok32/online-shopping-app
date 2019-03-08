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
		font-size: 20px;
		color: #292929;
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
		cursor: pointer;
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

	}
	#footer{
		top: 800px;
	}
	.viewer{
		font-size: 40px;
		position: relative;
		display: block;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
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
<script type="text/javascript">
	$(document).ready(function(){

		$(".item-holder").hover(function(){
			var x = $(this).find(".view-product")
			x.fadeToggle(100)
			
		})
	
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

<?php
error_reporting("no");
include("connection.php");
	$connection = new connect();
	$connection = $connection->connecter();

	if(!empty($_POST['x'])){
		$var = $_POST['x'];
		$q = "select * from products where name like '%$var%'";
		$exe = $connection->query($q);
		while ($row = mysqli_fetch_array($exe)) {
		$title = $row['name'];
		$price = $row['price'];

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
	}
	if($exe->num_rows < 1){
		echo "<div class='alert alert-danger'><span style='font-size: 22px;'>No Result Found!!</span></div>
		<style>#footer{
			margin-top: 500px;
		}</style>
		";
	}

?>