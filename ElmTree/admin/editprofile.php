<?php
session_start();
	

	
	include('../secure/conn.php');
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: ../login.php');
	}
	
	$read="SELECT * FROM elm_University";

	$result= $conn -> query($read);

	if(!$result){
	echo$conn->error;
	}
	
	$UserID = $_SESSION['40083514_ElmTreeID'];
	
	$read2 = "SELECT * FROM elm_User WHERE UserID ='$UserID'";
	$result2= $conn -> query($read2);
	
	if(!$result2){
	echo$conn->error;
	}

?>
<!DOCTYPE html>
<html>
	<head>
	
		<title>ElmTree</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="../styles/styles.css">
		
	</head>
	
	<body>
	
		<?php
			include('nav1direcup.php');
		?>
		
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-12">
					<h3 class='display-4 text-center'>Edit Profile Details</h3> 
					
					<form action='editedprofile.php' method='POST' enctype='multipart/form-data' class="border">
					
						<div class="row justify-content-md-center ">
							<div class="col-8 text-center">

					<?php

						$populate =$result2->fetch_assoc();
						
						$user = $populate['Username'];
						$pass = $populate['Password'];
						$email = $populate['Email'];
						$mobile = $populate['Mobile'];
						$insta = $populate['Instagram'];
						
						echo"<label for='exampleInputPassword1'>Username</label>
							<input required='true' class='form-control' id='exampleInputPassword1' placeholder='$user' name='username'>
						
						
							<label for='exampleInputPassword1'>Password</label>
							<input required='true' type='password' class='form-control' id='exampleInputPassword1' placeholder='$pass' name='password'>
						
						
							<label for='exampleInputEmail1'>Email address</label>
							<input required='true' type='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='$email' name='email'>
						
						
							<label for='exampleInputPassword1'>Mobile Number</label>
							<input required='true' class='form-control' id='exampleInputPassword1' placeholder='$mobile' name='number'>
					
							<div class='form-group'>
										<label for='exampleFormControlSelect1'>University</label>
										<select required='true' class='form-control' id='exampleFormControlSelect1' name='university'>";
									
								  
											while($row =$result->fetch_assoc()){
									
												$uni = $row['University'];
												$uniID = $row['UniID'];
												
												echo "<option>$uniID) $uni</option>";
									  
											}
									
								echo"		</select>
							</div>
							<label for='exampleInputPassword1'>Enter Instagram Username</label>
							<input required='true' class='form-control' id='exampleInputPassword1' placeholder='$insta' name='instagram'>
							<p>Finished?</p>
							<input type='submit' class='btn btn-dark' value='UPDATE PROFILE'></input>";
						?>						
						</div>
					</div>	
					
					<div class="row" id="filler">
					
					</div>
					</form>
				</div>		
				
			</div>
				
				
				<div class="row" id="filler">
				
				</div>
				
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