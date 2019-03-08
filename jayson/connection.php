<?php
class connect{

	function connecter(){
		$localhost = "localhost";
		$root = "root";
		$password = "";
		$db = "jshop";
		return new mysqli($localhost,$root,$password,$db);
	}

}


?>