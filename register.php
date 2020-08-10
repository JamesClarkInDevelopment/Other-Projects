<?php

	include('secure/conn.php');
	
	
	$read="SELECT * FROM elm_University";
	
	
	$result= $conn -> query($read);
	
	
	
	if(!$result){
	echo$conn->error;
	}


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
					<h2 class="display-3">Register with ElmTree</h2>
					<h5 class="display-5">Enter your details below</h5>
				</div>
				
			</div>
			
			
			<form action='admin/registered.php' method='POST' enctype='multipart/form-data' class="border">
				
				<div class="row justify-content-md-center ">
					<div class="col-8 text-center">

					<label for="exampleInputPassword1">Username</label>
					<input  class="form-control" id="exampleInputPassword1" placeholder="Enter a Username" name="username">
				
				
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Create Password" name="password">
				
				
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email " name="email">
				
				
					<label for="exampleInputPassword1">Mobile Number</label>
					<input  class="form-control" id="exampleInputPassword1" placeholder="Enter Mobile Number" name="number">
				
					<div class="form-group">
								<label for="exampleFormControlSelect2">University</label>
								<select multiple class="form-control" id="exampleFormControlSelect2" name='university'>
		
							
							  <?php
									while($row =$result->fetch_assoc()){
							
										$uni = $row['University'];
										$uniID = $row['UniID'];
										
										echo "<option>$uniID) $uni</option>";
							  
									}
							?>
								</select>
					</div>

					</div>
				</div>
				
				<div class="row justify-content-md-center">
					<div class="col-4  text-center">
						
							<label for="exampleInputPassword1">Enter Instagram Username</label>
							<input  class="form-control" id="exampleInputPassword1" placeholder="@Instagram" name="instagram">
						
					</div>
					<div class="col-4  text-center">
						
							<label for="exampleFormControlFile1">Upload Profile Picture</label>
							<input type="file" class="form-control-file" id="exampleFormControlFile1" name="profilepic">
						
					</div>
				</div>
				
				<div class="row  text-center ">
				<div class="col">
				</div>
				<div class="col-4  text-center">
					<p>Finished?</p>
					<input type="submit" class="btn btn-dark" value ="Register"></input>
				</div>
				<div class="col-4 text-center">
					<p>Already Registered?</p>
					<a class="btn btn-dark" type="submit" href="login.php" role="button">Login Here</a>
				</div>
				<div class="col" >
				
				</div>
				</div>
				<div class="row" id="filler">
				
				</div>
			</form>
			
			<div class="row  text-center " id='filler'>
			
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