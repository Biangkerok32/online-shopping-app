</!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	if(!isset($_SESSION['admin'])){
		header("location: index.php");
	}

	?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
	
	<script type="text/javascript" src="js/Popper.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/vue.min.js"></script>

	<style type="text/css">
		#left-nav{
			float: left;
			
			position: fixed;
			height: 100px;
			width: 100%;
			top: 50px;
			z-index: 5;

		}
		#left-nav ul{
			padding: 0;
			position: relative;
			width: 100%;
			clear: both;
			list-style-type: none;
			height: auto;
			overflow: hidden;
			text-align: right;
			padding-right: 200px;

		}
		#left-nav ul li{
			display: inline-block;
			cursor: pointer;
			text-align: center;
			color: #f5f5f5;
			margin-bottom: 5px;
			font-style: italic;
			padding: 10px;
			font-size: 17px;
			background-color: #333;
			border-bottom: 1px solid #666666;


		}
		
		#admin-body{
			position: relative;
			
			width: 80%;
			float: left;
			height: auto;
			overflow: auto;
			top: 190px;
			margin: auto;
			left: 50%;
			transform: translate(-50%,0);
			

			
		}
		.label-break{
			float: left;
			position: relative;
			clear: both;
			width: 100%;
			margin-bottom: 20px;

		}
		#label{
			float: left;
			clear: left;
			position: relative;
			width: 50px;
		}
		.label2{
			float: left;
		
			position: relative;
			width: 60px;
		}
		.time{
			float: left;
			position: relative;
			width: 100px;
			padding: 3px;
		}
		.type{
			width: 250px;
			float: left;
			position: relative;
			padding: 3px;
		}
		.naver{
			width: 100%;
			position: fixed;
			top: 0px;
			background-color: #333;
			height: 50px;
			z-index: 9;
		}
		.naver ul{
			float: left;
			clear: left;
			position: relative;
		}
		.naver ul li{
			display: inline-block;
			line-height: 50px;
			color: #f5f5f5;
			margin-right: 20px;
		}
		#logger{
			float: right;
			position: relative;
			clear: right;
			line-height: 50px;
			margin-right: 50px;

		}
		#logger a{
			color: #f5f5f5
		}
	</style>
</head>

<div class="naver">
	<ul>
		<li><?php  echo strval(date("Y-M-d")); ?></li>
		
		<li>Welcome Admin</li>
		
	</ul>
	<div id="logger">
		<a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
	</div>
	</div>
<div class="modal fade" id="report">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<span style="font-size: 22px;"><i class='fa fa-line-chart'></i></span>
			</div>
			<div class="modal-body">
				<form action="#" method="POST" id="submitRep">
					<div class="input-group">
				<div class="label-break">
					<div id="label">
						Type: 
					</div><select name="type" class="input-control type" required id="typer">
						<option disabled selected>Choose</option>
						<option>Orders</option>
						
						<option>Stock out</option>
						<option>Stock In</option>
					</select>

				</div>
				<div class="label-break">
					<div class="label2" style="clear: left;">
						Month: 
					</div><select name="month" class="input-control time" style="width: 100%;" required>
						<option disabled selected>Choose</option>
           			 <option>January</option>
          			  <option>February</option>
           			 <option>March</option>
           			 <option>April</option>
           			 <option>May</option>
          			 <option>June</option>
          			 <option>July</option>
           			 <option>August</option>
            		<option>September</option>
            		<option>October</option>
            		<option>November</option>
            		<option>December</option>
					</select>
					<div class="label2">
						Year: 
					</div><select name="year" class="time" style="width: 100%;" required>
						<option disabled selected>Choose</option>
            <option>2017</option>
            <option>2018</option>
            <option>2019</option>
           
					</select>

				</div>
				
			</div>
			<div class="label-break" style="float: left;clear: left;position: relative;width: 100%;text-align: center;">
					<input type="submit" name="submit" class="btn btn-primary">
				</div>
			</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		var clientwidth = window.innerWidth

		var width = $("#left-nav").width()
	
	
		

		$("#left-nav ul li").click(function(){
			var index = $(this).index()
			$("#left-nav ul li").css({"font-size": "16px"})
			$(this).css({"font-size": "24px"})
			switch(index){
				case 0:
					$("#admin-body").load("productsViews.php")
				break;
				case 1:
					$("#admin-body").load("orders.php")
				break;
				case 2:
					$("#admin-body").load("customers.php")
					
				break;
				case 3:
					
					
				break;
				case 4:
					$("#admin-body").load("supplier.php")
				break;
				case 5:
					
				break;
				
				default:
				break;
			}
		})
		$('#typer').change(function(){
			var val = $(this).val()
			if(val == "Employees Attendance"){
			}else if(val == "Orders"){
				$("#submitRep").attr("action","ordersReport.php")
			}else if(val == "Stock out"){
				$("#submitRep").attr("action","stockReport.php")
			}else if(val =="Stock In"){
				$("#submitRep").attr("action","stockInReport.php")
			}

			
		})
	})
</script>
<body>

	
	<nav id="left-nav">
		<ul>
			<li><i class="fa fa-shopping-cart fa-2x"></i><br /> products</li>
			<li><i class="fa fa-envelope fa-2x"></i><br /> orders</li>
			<li><i class="fa fa-group fa-2x"></i><br /> customers</li>			
			
			<li data-toggle = 'modal' data-target='#report'><i class="fa fa-line-chart fa-2x" ></i><br /> Reports</li>
			<li><i class="fa fa-plus fa-2x"></i><br /> Supplier</li>
			

		</ul>	


	</nav>

	<div id="admin-body">
		<h1>Hello Admin! Good Day!</h1>
	</div>
	

</body>
</html>