
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/Popper.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<?php

function getMonthVal($month){
  $monthval = 0;
  switch ($month) {
      case 'January':
        $monthval = 1;
        break;
      case 'February':
        $monthval = 2;
        break;
      case 'March':
        $monthval = 3;
        break;
      case 'April':
        $monthval = 4;
        break;
      case 'May':
        $monthval = 5;
        break;
      case 'June':
        $monthval = 6;
        break;
      case 'July':
        $monthval = 7;
        break;
      case 'August':
        $monthval = 8;
        break;
      case 'September':
        $monthval = 9;
        break;
      case 'October':
        $monthval = 10;
        break;
      case 'November':
        $monthval = 11;
        break;
      case 'December':
        $monthval = 12;
        break;
      
      default:
        
        break;
    }
    return $monthval;
}
$starter = null;
$end = null;
if(!empty($_POST['month']) && !empty($_POST['year'])){
		include("connection.php");
		$connection = new connect();
		$connection = $connection->connecter();

		$month = $_POST['month'];
		$year = $_POST['year'];
		$tmpmonth = $month;
		$month = getMonthVal($month);
		$start = "01-$month-$year";
		 $tmp = date("Y-m-d",strtotime($start));
		 $starter = strtotime($tmp);

		 $end = strtotime("01-$month-$year"."+1 months");
		 
		

}else{
	echo "oh snap!";
}


?>
<style type="text/css">
	#reportTitle{
		width: 90%;
		margin: auto;
		height: auto;
		overflow: hidden;
		position: relative;
		display: block;
		padding-top: 20px;
	}
	#reportTitle ul{
		display: block;
		position: relative;
		height: auto;
		overflow: hidden;
		padding-left: 0;

	}
	#reportTitle ul li{
		list-style-type: none;
		position: relative;

	}
  body{
    border-left:30px solid violet;
    border-right:30px solid violet;
  }
</style>
<div id="reportTitle">
	
	<ul>
		<li style="font-size: 30px; color: violet">Monthly Stock Out Report</li>
		<li>Covered Period: <?php echo $tmpmonth." of ".$year; ?></li>
		<li style="color: #888">Date Printed: <?php echo date("Y-m-d"); ?></li>
	</ul>
</div>
	

<style type="text/css">
	#container{
		display: block;
		position: relative;
		width: 80%;
	}
</style>
<div id="container" class="container">
	<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Customers Name</th>
      <th>Items</th>
      <th>Quantity</th>
      <th>Date</th>
      
    </tr>
  </thead>
  <tbody>

  	<?php
  	$q = "select * from ordered order by id desc";
  	$exe = $connection->query($q);
  	$count = 0;
  	$priceTotal = 0;
  	while ($row = mysqli_fetch_array($exe)) {
  		$dates = $row['delevered'];
  		$dates = strtotime($dates);
  		if($dates >= $starter){
  			if($dates < $end){
  				$id = $row['customerID'];
  				$q2 = "select * from customers where id = $id";
  				$exe2 = $connection->query($q2);
  				$row2 = mysqli_fetch_array($exe2);
  				$fullname = ucfirst($row2['fname'])." ".ucfirst($row2['lname']);
  				$count += 1;
  				$tmpdater = date("Y-m-d",$dates);
  				$items = $row['para1'];
  				$quantity = $row['para2'];
  				$price = $row['price'];
  				$priceTotal += $price;
  				$dOrdered = $row['dateOrdered'];
  				$dateDelevered = $row['delevered'];
  				echo "<tr>
  				<td>$count</td>
  				<td>$fullname</td>
  				<td style='max-width: 160px;word-break: break-word;'>$items</td>
  				<td>$quantity</td>
          <td>$dateDelevered</td>
  				
  				</tr>
  				";
  			}
  		}

  		
  	}
  	?>
  </tbody>
</table>
</div>
<style type="text/css">
	#res{
		width: 90%;
		margin: auto;
		display: block;
		margin-top: 30px;
		margin-bottom: 50px;
		padding: 20px;
		border-top: 1px solid #dedede;
	}
	#res ul{
		padding: 0;
		position: relative;
		display: block;
		float: right;
		clear: right;
		list-style-type: none;

	}
	#res ul li{
		
		display: inline-block;
		margin-right: 50px;
		font-size: 18px;
		color: #000;
	}
</style>
<div id="res">
	<ul>
		<li>Total # of Transactions: <?php echo $count; ?></li>
	</ul>
</div>




</body>
</html>




