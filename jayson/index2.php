<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	error_reporting("no");
	$customer = null;
	$cusId = null;
	if(isset($_SESSION['customer'])){
		$customer = $_SESSION['customer'];
		$cusId = $_SESSION['customerID'];
		$_SESSION['walleter'] = 0;
	}
	

	?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
	
	<script type="text/javascript" src="js/Popper.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/vue.min.js"></script>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
	<style type="text/css">
		#nav-bar{
			width: 100%;
			height: 50px;
			float: none;
			clear: both;
			position: fixed;
			background-color: #2b3342;
			left: 0px;
			top: 50px;
			z-index: 1;

		}
		#gtm{
			width: 100%;
			position: fixed;
			height: 50px;
			clear: both;
			top: 0px;
			z-index: 1;
			background-color: #1b1f26;
		}
		body{
			padding: 0;
			position: relative;
			left: 0px;
			top: 0px;

	
			background-color: #f5f5f5;

		}
		#jayson{
			color: #4949dd;
			display: block;
			left: 100px;
			position: relative;
			line-height: 50px;
			font-size: 25px;
			font-family: 'PT Serif', serif;
			letter-spacing: 15px;
		}
		#nav-bar ul{
			float: left;
			clear: left;
			position: relative;
			overflow: hidden;
			padding: 0;
			margin-top: 9px;
			width: 500px;
			border: 1px solid #00;
			text-align: center;

		}
		#nav-bar ul li{
			list-style-type: none;
			display: inline-block;
			text-align: center;
			color: #f5f5f5;
			cursor: pointer;


			
		}
		#nav-bar ul li:hover{
			text-decoration: underline;

		} #search-block{
			float: right;
			clear: right;
			position: relative;
			margin-top: 3px; 
			margin-left: 20px; 

		}
		#search-block input[type="text"]{
			
			width: 300px;
			outline: none;
			border: none;
			background-color: #f5f5f5;
			color: #333;
			width: 500px;
			padding: 10px;
			border-radius: 3px;
		}
		#search-block input[type="text"]:focus{
			
		}
		#contact:hover{
			text-decoration: none;
		}
		#body{
			margin-top: 200px;
			height: auto;
			overflow: hidden;
			position: relative;
			clear: both;
		}
		#footer{
			background-color: #000;
			height: 50px;
			width: 100%;
			margin-top: 570px;
			position: relative;
			clear: both;
		}
		#social-media{
			float: left;
			clear: left;
			position: fixed;
			list-style-type: none;
			padding: 0;
			background-color: #000;
			border-radius: 0px 5px 5px 0px;
			top: 100px;
			padding-bottom: 10px;
		}
		#social-media li{
			position: relative;
			width: 60px;
			line-height: 100px;
			text-align: center;
		}
		#social-media li a{
			color: #828282;
		}
		#admin-portal{
			float: right;
			clear: right;
			position: relative;
			right: 70px;
			top: 20px;
		}
		#admin-portal a{
			color: #828282;
		}
		#homer{
			float: left;
			top: -35px;
			left: 100px;
			position: relative;
			display: none;
		}
		#homer a{
			color: #f5f5f5;
		}
		#socialist{
			float: right;
			color: #f5f5f5;
			display: none;
			position: relative;
			display: inline-block;
		}
		#logged{
			float: right;
			clear: right;
			position: relative;
			display: block;
			width: 300px;
			height: 50px;
			right: 0px;
			top: 5px;


		}
		.res{
			
			line-height: 45px;
			position: relative;
			left: 5px;
			cursor: pointer;
			display: none;
			color: #f5f5f5;
			float: left;
			clear: left;
		}
		#proceed nav{
			background-color: green;
		}
		#proceed nav:hover{
			background-color: #3D3D3D;
			transition: background-color 0.5s;
		}
	
		@media screen and (max-width: 600px) {
			#search-block{
			float: right;
			clear: right;
			position: relative;
			margin-top: 3px; 
			margin-left: 20px; 

		}
		#search-block input[type="text"]{
			
			
			width: 260px;
			
		}
		#nav-bar ul{
			
			
			width: 150px;
			display: none;
			background-color: #2b3342;
		

		}
		#nav-bar ul li{
			display: block;
			text-align: center;
			width: 100%;
			font-size: 20px;

		}
		.res{
			
			display: block;
		}
		#logged{
			float: left;
			clear: left;
			width: 100%;
			background-color: #1e1e49;
			color: #f5f5f5;

		}
		}

		
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#body").load(

				<?php
				
				if(isset($_GET['reg'])){

					echo "'register.php'";
				}elseif(isset($_GET['checkout'])){

					echo "'checkout.php'";
				}elseif(isset($_GET['orderdetails'])){
					echo "'orderDetail.php'";
				}

				else{
					echo "'home.php'";
				}

				?>

				,function(){
			$("#footer").ready(function(){

			var bheight = window.innerHeight;
			var tmpheight = $("#body").height();
			var heightcalc = bheight - $("#footer").height();

			if(($("#body").height() - 100) < heightcalc - 60){

			}else{
				//$("#footer").animate({"margin-top": (bheight - tmpheight) - $("#footer").height()+"px"})	
			}
			$('#searchGo').submit(function(e){
				e.preventDefault()
				var val = $('#searchVal').val()
				$.post("searchRes.php",{x: val},function(data){
					$("#body").html(data)
				})

			})
			})

			$(".res").click(function(){
				$("#nav-bar ul").fadeToggle(100)
			})
			})
			})

		
	</script>
	 
	<div id="gtm">
		<span id="jayson">Jayson Shop</span>
		<ul id="socialist">
			<li><i class="fa fa-facebook fa-2x"></i></li>
			<li><i class="fa fa-facebook fa-2x"></i></li>
			<li><i class="fa fa-facebook fa-2x"></i></li>
			

		</ul>
	</div>
<div id="nav-bar">
	<div id="search-block">

		<form method="POST" action="#" id="searchGo"> 
			<input type="text" name="search" id="searchVal"  placeholder="Search Here" />
			
		</form>
	</div>
	<div id="logged">

		<div style="float: left;clear: left;position: relative;line-height: 46px;padding-left: 10px;padding-right: 10px;color: #f5f5f5"><?php echo $customer; ?></div>
			<a href='index2.php?orderdetails=1' id="proceed"><nav style="float: left;line-height:50px;text-align: center;margin-left: 10px;padding-left: 20px;padding-right: 20px;color: #f5f5f5;border-radius: 10px; " class=""><i class="fa fa-shopping-cart"></i></nav></a>
		<a href="logout.php"> <nav style="line-height: 60px;float: left;margin-left: 10px;color: #f5f5f5" title="log out" >Log out</nav></a>
		<a href="index2.php"> <nav style="line-height: 60px;float: left;margin-left: 10px;color: #f5f5f5" title="log out" >Home</nav></a>
		<div style="line-height: 61px;float: left;position: relative;margin-left: 20px;" class="text text-success">Wallet Balance: <?php include("connection.php");

			$connection = new connect();
			$connection = $connection->connecter();
			$q = "select * from wallet where customer_id = ".$cusId;
			$exe = $connection->query($q);
			$wallet = 0;
			$sutract = 0;
			while ($row = mysqli_fetch_array($exe)) {
				$wallet += intval($row['wallet']);
				
			}
			$q = "select * from payment where customer_id = ".$cusId;
			$exe = $connection->query($q);
			while ($row = mysqli_fetch_array($exe)) {
				$sutract += intval($row['wallet']);
				
			}
			$_SESSION['walleter'] = doubleval($wallet - $sutract);
			echo $_SESSION['walleter'];

		 ?></div>
	</div>
	
		<nav><i class="fa fa-list fa-2x res"></i></nav>
	<ul>
		<a href="index2.php"><li style="padding-right: 20px;padding-left: 20px;">Home</li></a>
		<li data-target="#logs" data-toggle="modal">Log in</li>
		<a href="index2.php?reg=1"><li style="padding-left: 20px;" id="contact">Register</li></a>
	</ul>

	
	
</div>

<style type="text/css">
		
		

	</style>
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#nav-bar ul").css({<?php if (isset($customer)) echo "display: 'none'";;?>})
		$("#logged").css({<?php if (!isset($customer)) echo "display: 'none'";;  ?>})
		$("#homer").css({<?php if (isset($customer)) echo "display: 'block'";;  ?>})

		$("#customerForm").submit(function(e){
			e.preventDefault()
			var data = new FormData(this)
			$.ajax({
				url: "loginQuery.php",
				method: "POST",
				data: data,
				processData: false,
				contentType: false,
				success: function(exe){

					if(exe == "success"){
						alert("successfully log on")
						window.location = 'index2.php'
					}else{
						alert(exe)
					}
				}

			})
		})
	})
</script>
<style type="text/css">
	
	.input-control{
		outline: none;
		border: none;
		position: relative;
		width: 100%;
		clear: both;
		margin-bottom: 30px;
		border-bottom: 1px solid #dedede;
	}
	#customerForm{
		width: 100%;
	}
</style>
<div class="modal fade" id="logs">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<span style="font-size: 22px;"><i class="fa fa-key"></i>Log In</span>
				<span style="font-size: 22px;cursor: pointer;" data-dismiss="modal">&times</span>
			</div>
			<div class="modal-body">
				<form action="#" method="POST" id="customerForm">
					
				<input type="text" name="username" placeholder="Username" class="input-control" width="100%" required  />
				
				
				<input type="password" name="password" placeholder="Password" class="input-control" required />
				
				
					<input type="submit" style="position: relative;float: right;clear: right;"  value="Log in" class="btn btn-primary" name="submit">
				
				</form>

			</div>
			
				
			
		</div>
	</div>

</div>
<div id="body" class="container">

</div>
<style type="text/css">



</style>
<script type="text/javascript">
	$(function(){
		$("#admin-form").submit(function(e){
		

		})
	})
</script>
<div class="modal fade" id="admin-log">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<span style="font-size: 22px;"><i class="fa fa-lock"></i> Admin</span>
				<span style="font-size: 22px;cursor: pointer;"  data-dismiss="modal">&times</span>
			</div>
			<div  class="modal-body">
				<form action="adminLogQuery.php" method="POST" id="admin-form">
				<div class="label-margin">
					<nav class="label">Username: </nav><input type="text" name="username" class="input-control" required  />
				</div>
				<div class="label-margin">
					<nav class="label">Password: </nav><input type="password" name="password" class="input-control" required />
				</div>
				<div class="label-margin">
					<input type="submit"  value="Log in" class="btn btn-secondary" style="margin: auto;" name="submit">
				</div>
				</form>
				
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
	</div>
	<style type="text/css">
		#footer ul li{
			display: inline-block;
			line-height: 30px;
			color: #f5f5f5;
			margin-right: 10px;
			cursor: pointer;
		}
	</style>
<div id="footer">
	<ul style="float: left;clear: left;position: relative;list-style-type: none;">
		<li>Blogs</li>
		<li>About us</li>
		<li>Contact Us</li>
	</ul>
	<nav id="admin-portal"><span><a href="#" data-toggle="modal" data-target="#admin-log"><i class="fa fa-lock"></i></a></span></nav>
</div>
</body>
</html>