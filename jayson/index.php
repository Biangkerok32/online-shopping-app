<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
	
	<script type="text/javascript" src="js/Popper.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/vue.min.js"></script>
	<title>Admin Log in</title>
	<style type="text/css">
	body{
		

	}
		#admin-form{
			
			position: relative;
			width: 400px;
			margin: auto;
			margin-top: 200px;

		}
	</style>
</head>
<body>
	<form action="adminLogQuery.php" method="POST" id="admin-form">
		<h1>Admin Log in</h1>
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
</body>
</html>