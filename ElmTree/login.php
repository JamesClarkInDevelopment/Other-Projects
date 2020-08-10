<?php

	

?>
<!DOCTYPE html>
<html>
	<head>
	
		<title>ElmTree</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/styles.css">
		
	</head>
	
	<body>
	
		<?php
			include('nav.php');
		?>
		
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-lg text-center" >
					<h2 class="display-3">Login with ElmTree</h2>
				</div>
				
			</div>
			
			<form class="border text-center" action='signin.php' method='POST' enctype='multipart/form-data'>
				
				<div class="row justify-content-md-center">
					<div class="col-8 text-center">
					
						<label for="exampleInputEmail1">Enter Username</label>
						<input  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username " name="postuser">
					
					
						<label for="exampleInputPassword1">Enter Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="postpass">
						<div class="row  text-center " id='filler'>
						</div>
							
							<button type="submit" class="btn btn-dark">Login</button>

						<div class="row  text-center " id='filler'>
						</div>
					</div>
				</div>
			</form>
			
			<div class="row justify-content-md-center">
				<div class="col-8">
					<p>You Haven't Registered?</p>
					<a class="btn btn-dark" type="submit" href="register.php" role="button">Register Here</a>
				</div>
			</div>
			<div class="row justify-content-md-center" id="filler">
			</div>
		
		</div>
		<?php
			include('footer.php');
		?>
		
		
		
		
		
		
		
	
	
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	</body>
</html>