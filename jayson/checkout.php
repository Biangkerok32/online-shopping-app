<?php
session_start();

?>

<script type="text/javascript">
	$(document).ready(function(){

		$("table button").click(function(){
			var id = $(this).attr("id")
			var tmp = id
			id = id.substring(1)
			
			var con = confirm("Are you sure?")
			if(con == true){
				$.post("cartRemove.php",{x: id},function(data){
					if(data == "success"){
						window.location = "index.php?orderdetails=1"
					}else{
						alert("error occured while deleting cart")
					}
					
				})
				
			}
		})
		$("#orderSubmit").click(function(){
			var tmp = document.getElementsByClassName("proName")
			var tmp2 = document.getElementsByClassName("input-control-quantity")
			var trackingCode = $("#tracking").html()
			var res = "";
			var res2 = "";
			var ids = $("#totalds").val()

			for(var i = 0;i < tmp.length;i++){
				res += tmp[i].innerHTML+","
				res2 += tmp2[i].value+","
			}
			var para = res.substring(0,res.length - 1)
			var para2 = res2.substring(0,res2.length - 1)
			totalPrice = parseInt($("#totalPrice").html())

			if(totalPrice <= <?php
				$wallet = $_SESSION['walleter'];
				echo $wallet;
			?>){
				$.post("submitOrderQuery.php",{x1: para,x2: para2,codes: trackingCode,totalds: ids,price: totalPrice},function(data){
				alert(data)
				if(data == "success"){

					window.location = "index.php?orderdetails=1";
				}
			})
			}else{
				alert("your wallet balance is not enough to purchase item(s), Please top up")
			}
			

			


		})

		
		$(".input-control-quantity").change(function(){
			var tmp = $(this).attr("id")
			var id = tmp.substring(1)
			var price = $("#p"+id).html()
			var multiplent = $(this).val()
			
			price = parseInt(price)
			var product = price * multiplent
			$("#m"+id).html(product)
			var doc = document.getElementsByClassName("subs")

			var tmpres = 0;
			for(var i = 0;i < doc.length;i++){
				tmpres += parseInt(doc[i].innerHTML)
			}
			$("#totalPrice").html(tmpres)

			



		})
	})
</script>
<style type="text/css">
	#container3{
		width: 85%;
		position: relative;
		background-color: #fff;
		padding: 20px;
		border-radius: 10px;
		border: 1px solid #dedede;
		margin: auto;
		height: auto;
		overflow: hidden;
		margin-top: 80px;
	}
	#yourOrder{
		margin: auto;
		position: relative;
		width: 90%;
		border-radius: 5px;
		padding: 10px;
		margin-top: 20px;
	}
	#footer{
		margin-top: 500px;
		bottom: 0px;
	}
	.input-control-quantity{
		width: 60px;
		border: none;
		text-align: center;
	}
	@media screen and (max-width: 600px) {
		#container3{
			width: 100%;
			padding: 0px;
			overflow: auto;
		}
		.table-danger{
			width: 100%;
		}
		body{
			padding: 0px;
		}
		#yourOrder{
			padding: 0px;
		}

	}
</style>
<div class="container" id="container3">
	<div id="yourOrder">
		
		<nav style="width: 100%;padding-left: 10px;font-size: 18px;" class="text text-dark">Order list</nav>
		<table class="table table-success">
			<thead>
				<th>#</th>
				<th>Product</th>
				<th>Description</th>
				<th>Price</th>
				<th>Subtotal</th>
				<th>Quantity</th>
				<th>Action</th>
			</thead>
			<tbody>
				
				<?php
				include("connection.php");
				$numer = null;
				$trcode = null;
				$connection = new connect();
				$connection = $connection->connecter();
				
				if(isset($_SESSION['customerID'])){
					$id = $_SESSION['customerID'];
				}
					$q = "select * from orders where customers_id = $id";
					$exe = $connection->query($q);
					$count = 0;
					$totals = 0;
					$totalds = [];
					while ($row = mysqli_fetch_array($exe)) {
						
						$productID = $row['productID'];
						$ds = $row['id'];
						

						$value = $row['quantity'];
						$q2 = "select * from products where id = $productID";
						$exe2 = $connection->query($q2);
						$row2 = mysqli_fetch_array($exe2);
						$productName = $row2['name'];
						$productDescription = $row2['discription'];
						$price = $row2['price'];
						$sub = $price * $value;
						
						$sold = $row['sold'];
						if($sold == 0){
							$count += 1;
							$totalds[$count - 1] = $ds;
							$totals += $sub;
						echo "<tr id='row$ds'>
						<td><strong>$count</strong></td>

						<td><span class='proName'>$productName</span></td>
						<td style='max-width: 100px;word-break: break-word'>$productDescription</td>
						<td><span id='p$ds'>$price</span></td>
						<td><span id='m$ds' class='subs' style='font-weight: bold;font-size: 18px;'>$sub</span></td>
						<td><input type = 'number'

						";
						$q3 = "select * from ordered where customerID = $id";
						$exe3 = $connection->query($q3);

						$numer = $exe3->num_rows;
						while ($fetch = mysqli_fetch_array($exe3)) {
							$trcode = $fetch['trackingCode'];
							$solder = $fetch['sold'];
						}
						
						$btnDisabled = "disabled";
						if($numer > 0 && $solder == false){
							echo "disabled";
						}
						echo "
						 value='$value' name ='quantity' id='q$ds' class='input-control-quantity' /></td>	
						<td><button class='btn btn-danger' id='r$ds'";
						if($numer > 0 && $solder == false){
							echo $btnDisabled;
						}
						echo "><i class='fa fa-trash'></i></button></td>

						";
						echo"

						</tr>";
						}

						
					}
					$res  = "";
					for($i = 0;$i < sizeof($totalds);$i++){
						$res = $res."-".$totalds[$i];
					}
					$res = substr($res, 1);

				?>


			</tbody>
		</table>
		<style type="text/css">
			#summarry{
				float: left;
				clear: left;
				position: relative;
				width: 100%;
				height: auto;
				overflow: hidden;

			}
			#summarry1{
				float: left;
				clear: left;
				width:49%;
				position: relative;
				height: auto;
				overflow: hidden;
				padding-left: 20px;
				font-size: 30px;
				margin-top: 20px;
				padding: 30px;
				border-radius: 10px;
			}
			#summarry2{
				float: left;
				position: relative;
				width: 48%;
				height: auto;
				overflow: hidden;
				margin-top: 20px;
				margin-left: 10px;
				padding: 30px;
			}
			#summarry1 ul{
				list-style-type: none;
				padding: 0;
				float: left;
				width: 100%;
				clear: both;
			}
		</style>
		<div id="summarry" >
			<nav style="width: 100%;padding-left: 20px;padding-top: 20px;position: relative;padding-bottom: 20px;border-bottom: 1px solid #dedede;border-top: 1px solid #dedede"><span style="font-size: 18px;" class="text text-info">Order Summary</span></nav>
			
		</div>
		<div id="summarry1" >
			<ul>
				<li>Total Price:  <strong><span id="totalPrice"><?php echo $totals; ?></span></strong></li>
			</ul>
		</div>
		<div id="summarry2" style="width: 100%;margin-bottom: 50px;">
			<nav style="width: 100%;padding-bottom: 10px;"><span class="text text-info">Details</span></nav>
			<strong style="opacity: 0">Tracking code: <span id="tracking"><?php if($numer > 0){ echo $trcode;}else{ echo uniqid("",false); } ?></span></strong>
			<input type="text" id="totalds" value="<?php echo $res; ?>" style="display: none;">
			<p style="color: #545454;margin-top: 10px;font-size: 14px;">
				<?php
				$q = "select * from orderdetails where customers_id = $id";
				$exe = $connection->query($q);
				$row = mysqli_fetch_array($exe);
				$flname = $row['flname'];
				$mobile = $row['mobile'];
				$completeAddress  = $row['completeAddress'];
				$province = $row['province'];
				$candm = $row['candm'];
				$barangay = $row['barangay'];

				echo $flname.", ".$mobile.", ".$province.", ".$candm.", ".$barangay.", ". $completeAddress;

				?>


			</p>
		</div>
		<button class="btn btn-success" style="display: block;clear: both;margin: auto;margin-top: 50px;position: relative;" <?php if($numer > 0 && $solder == false)echo $btnDisabled;; ?> id="orderSubmit" style="display: block;margin: auto;">Looks Good</button>
		<?php
		if($numer > 0 && $solder == false){
			echo "<div role ='alert' style='margin-top: 15px;'>
			<span style='font-size: 25px;' class='text text-success'>Order Succesfully Placed, Wait For Your Order To Arrive 5 days from now</span>
		</div>
		<script>
		$(document).ready(function(){
			$('#wait').css({display: 'block'})
		})
		</script>

		";
		}
		?>
		
	</div>

	</div>