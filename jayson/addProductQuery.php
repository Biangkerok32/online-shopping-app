<?php


if(!empty($_POST['products-date']) && !empty($_POST['products-name']) && !empty($_POST['products-discription']) && !empty($_POST['stocks']) && !empty($_POST['suppliers']) && !empty($_POST['price']) && !empty($_POST['type'])){
	if(!empty($_FILES['images']['tmp_name'][0])){

		$extension = array("jpg","png");
		$files = $_FILES['images'];
		include("connection.php");
		$connection = new connect();
		$connection = $connection->connecter();
		$date = $_POST['products-date'];
		$name = $_POST['products-name'];
		$discription = $_POST['products-discription'];
		$stocks = $_POST['stocks'];
		$supplier = $_POST['suppliers'];
		$price = $_POST['price'];
		$type = $_POST['type'];

		$q = "insert into products(product_date,name,discription,price,supplier,type,sellingStocks) values('".$date."','".$name."','".$discription."','".$price."','".$supplier."','".$type."',$stocks)";
		$query = $connection->query($q);
		
		if($query){

			$q = "select * from products";
			$nums = $connection->query($q);
			$count = 0;
			while ($row = mysqli_fetch_array($nums)) {
				$count = $row['id'];
			}

			foreach ($files['name'] as $key => $value) {
				$ext = strtolower(end(explode(".", $value)));

				if(in_array($ext, $extension)){
					$new_name = uniqid("",true).".".$ext;
					$destination = "images/".$new_name;
					if(move_uploaded_file($files['tmp_name'][$key], $destination)){
						$q = "insert into images(product_id,name) values('".$count."','".$new_name."')";
						$query = $connection->query($q);
						if($query){
							echo "Successful";
						}
					} 
				}else{
				echo "Images are only allowed";
				}
			}
		}



		
		
	}


}else{
	echo "failed";
}


?>