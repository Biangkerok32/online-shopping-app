<?php
include("connection.php");
session_start();
if(isset($_SESSION['customerID'])){
	$customerID = $_SESSION['customerID'];
}
$connection = new connect();
$connection = $connection->connecter();
$q = "select * from orderdetails where customers_id = $customerID";
$exe = $connection->query($q);
$num = $exe->num_rows;
if($num != 0){
	header("location: index2.php?checkout=1");
}
?>

<style type="text/css">
	#container3{
		width: 100%;
		position: relative;
		background-color: #fff;
		padding: 20px;
		border-radius: 5px;
		border: 1px solid #dedede;
		margin: auto;
		height: auto;
		overflow: hidden;
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
	}
	.label-name{
		float: left;
		clear: left;
		position: relative;
		width: 200px;
	}
	#orderDetailBreaker{
		
		position: relative;
		clear: left;
		width: 90%;
		margin: auto;
		height: auto;
		overflow: hidden;
		margin-top: 30px;
	}
	.breaker{
		margin-bottom: 12px;
	}
	.input-control3{
		width: 300px;
		padding: 5px;
	}
	
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#orderDetail").submit(function(e){
			e.preventDefault()
			var dataForm = new FormData(this)
			$.ajax({
				url: "orderDetailQuery.php",
				method: "POST",
				data: dataForm,
				processData: false,
				contentType: false,
				success: function(data){
					if(data == "success"){
						$("#detailSuccess").fadeIn(200,function(){
							setTimeout(function(){
								window.location = "index2.php?checkout=1"
							},300)
						})
					}
				}
			})
		})
	})
</script>
<div class="container" id="container3">
	<div id="orderDetailBreaker">.
		<div class="alert alert-info" role="alert" style="margin-bottom: 40px;">
			<span><strong>Please Fill Up The Form to proceed</strong></span>
		</div>
	<form action="#" method="POST" id="orderDetail">
		<div class="breaker">
		<div class="label-name">
			First & last Name: 
		</div>	<input type="text" class="input-control" name="flname" required>	
		</div>
		<div class="breaker">
		<div class="label-name">
			Mobile Number: 
		</div>	<input type="number" class="input-control" name="mobile" required>	
		</div>
		<div class="breaker">
		<div class="label-name">
			Province: 
		</div>	<input type="text" class="input-control" name="province" required>	
		</div>
		<div class="breaker">
		<div class="label-name">
			City/Municipality:
		</div>	<input type="text" class="input-control" name="candm" required>	
		</div>

		<div class="breaker">
		<div class="label-name">
			Barangay:
		</div>	<input type="text" class="input-control" name="barangay" required>	
		</div>
		<div class="breaker">
		<div class="label-name">
			Complete Address:
		</div>	<input type="text" class="input-control" name="completeAddress" required>	
		</div>
		<button style="display: block;margin: auto;" type="submit" class="btn btn-success"> Looks Good</button>
	</form>
<div class="alert alert-success" role="alert" style="margin-top: 20px;display: none;" id="detailSuccess">
	<span><strong>Successfully Submitted!</strong></span>
</div>
<div class="alert alert-danger" role="alert" style="margin-top: 20px;display: none;" id="detailFailed">
	<span><strong>Error Occured!</strong></span>
</div>
	</div>
</div>