<style type="text/css">
	#container2{
		border: 1px solid #000;
		border-radius: 50px;
		position: relative;
		width: 60%;
		height: auto;
		overflow: hidden;
		padding: 30px;
		background-color: #fff;
		border: 1px solid #dedede;
		margin-bottom: 20px;
	}
	.label-name{
		float: left;
		clear: left;
		position: relative;
		width: 100px;
		height: auto;
		overflow: hidden;
	}
	.input-control-breaker{
		width: 100%;
		position: relative;
		clear: both;
		height: auto;
		overflow: hidden;
		margin-bottom: 5px;
		padding-left: 30px;
	}
	.input-control2{
		float: left;
		width: 350px;
		position: relative;
	}
	#regSub{
		position: relative;
		display: block;
		margin: auto;
		margin-top: 20px;

	}#regFailed , #regSuccess{
		display: none;
		position: relative;
		margin-top: 20px;
	}
	@media screen and (max-width: 600px) {
		#container2{
			width: 100%;
			border-radius: 0px;
		}
	}

</style>
<script type="text/javascript">
	$(function(){
		$("#regForm").submit(function(e){
			e.preventDefault()
			var x = new FormData(this)
			$.ajax({
				url: "regQuery.php",
				data: x,
				method: "POST",
				processData: false,
				contentType: false,
				success: function(data){
					if(data != "success"){
						$("#regFailed").css({display: "block"})
						$(".regFailedMessage").html(data)
						$("#regSuccess").css({display: "none"})

					}else{

						$("#regFailed").css({display: "none"})
						$(".regFailedMessage").html("Successfully registered")
						$("#regSuccess").css({display: "block"})
						$(".input-control2").val(null)
					}
				}

			})
		})
	})
</script>
<div class="container" id="container2">
<div class="alert alert-info" role="alert">
	<span>Please Fill the registration form</span>
</div>
	<form action="#" method="POST" id="regForm">
		<div class="input-control-breaker">
		<div class="label-name">First Name: 
		</div><input type="text"  name="fname" class="input-control" required >
	</div>
	<div class="input-control-breaker">
		<div class="label-name">Last Name: 
		</div><input type="text"  name="lname" class="input-control" required>
	</div>
	<div class="input-control-breaker">
		<div class="label-name">Username: 
		</div><input type="text"  name="username" class="input-control" required>
	</div>
	<div class="input-control-breaker">
		<div class="label-name">Password: 
		</div><input type="password"  name="password" class="input-control" required>
	</div>
	<div class="input-control-breaker">
		<div class="label-name">Confirm Password: 
		</div><input type="password"  name="confirm" class="input-control" required>
	</div>
	<div class="input-control-breaker">
		<div class="label-name">Mobile Number: 
		</div><input type="number"  name="mnumber" class="input-control" required>
	</div>
	<div class="input-control-breaker">
		<div class="label-name">Email: 
		</div><input type="text"  name="email" class="input-control" required>
	</div>
	<div class="input-control-breaker">
		<div class="label-name">Address: 
		</div><input type="text"  name="address" class="input-control" required>
	</div>
	<div class="input-control-breaker">
		<div class="label-name">BirthDate: 
		</div><input type="date"  name="birthdate" class="input-control" required>
	</div>

	<div class="input-control-breaker">
		<div class="label-name">Gender: 
		</div><select class="input-control" name="gender" required>
			<option>Male</option>
			<option>Female</option>
		</select>	</div>
	<button type="submit" class="btn btn-primary" id="regSub">Looks Good</button>
	</form>
	<div class="alert alert-danger" role="alert" id="regFailed" >
		<span class="regFailedMessage"></span>
	</div>
	<div class="alert alert-success" role="alert" id="regSuccess">
		<span class="regFailedMessage"></span>
	</div>
	</div>