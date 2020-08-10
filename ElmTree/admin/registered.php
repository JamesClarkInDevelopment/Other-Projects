<?php
session_start();
	
	
		
	include('../secure/conn.php');
	
	$user = $conn->real_escape_string($_POST['username']);
	$pass = $conn->real_escape_string($_POST['password']);
	$email = $conn->real_escape_string($_POST['email']);
	$number = $conn->real_escape_string($_POST['number']);
	$instagram = $conn->real_escape_string($_POST['instagram']);
	$uni = $conn->real_escape_string($_POST['university']);
	
	
	$filename = $_FILES['profilepic']['name'];
	
	$filetmp = $_FILES['profilepic']['tmp_name'];
	
	move_uploaded_file($filetmp,"../productimages/".$filename);
	
	$insert = "INSERT INTO elm_User (UniID,Username,Password,Email,Mobile,Instagram,ProfilePicture) VALUES ('$uni','$user','$pass','$email','$number','$instagram','$filename')";
	
	//echo $user.$pass.$email.$number.$uni.$instagram
	

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
				<div class="col-8 text-center">
					<div class="row" id="filler">
				
					</div>
					<?php
							$resultinsert= $conn -> query($insert);
							
							if(!$resultinsert){
							echo $conn->error;}
							else{
								echo"<h3 class='display-4 text-center'> Welcome $user</h3> ";
							}
					?>
				
				<h3 class='display-4 text-center'> Thanks for Joining us!! </h3>
					<p class= 'text-center' >Login to get Started!!</p>
					<a class="btn btn-dark"  href="../products.php" role="button">Browse Products</a>
					<a class="btn btn-dark"  href="../login.php" role="button">Login</a>
					<p class= 'text-center' >Be sure to follow us on Instagram @ElmTree</p>
					<div class= "row" id ="filler">
					
					</div>
					
				
				</div>
				<div class="col-4">
					<?php echo " <img src='../productimages/$filename' id='productGrid'>"; ?>
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