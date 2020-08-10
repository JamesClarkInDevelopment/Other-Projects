<?php

session_start();
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: ../login.php');
	}
		
	include('../secure/conn.php');
	
	$userID = $_SESSION['40083514_ElmTreeID'];
	$productname = $conn->real_escape_string($_POST['productname']);
	$price = $conn->real_escape_string($_POST['price']);
	$desc = $conn->real_escape_string($_POST['desc']);
	$category= $conn->real_escape_string($_POST['category']);
	$productID = $conn->real_escape_string($_POST['productID']);
	
	$read = "SELECT * FROM elm_Products WHERE UserID ='$productID'";
	$result = $conn-> query($read);
	
	if(!$result){
		$conn->error;
	}
	
	$update = "UPDATE elm_Products SET CatID = '$category',Title = '$productname',Price = '$price',Description = '$desc' WHERE ProductID = '$productID'";
	
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
				<div class="col-12 text-center">
					<div class="row" id="filler">
				
					</div>
					<?php
							$result= $conn -> query($update);
							
							if(!$result){
							echo $conn->error;}
							else{
								echo"<h3 class='display-4 text-center'> Product Updated </h3> 
								<p class= 'text-center' >Be sure to follow us on Instagram @ElmTree</p>
								
								
								";
								
								
							}
					?>


				
					<a class="btn btn-dark"  href="profile.php" role="button">Profile</a>
					<div class= "row" id ="filler">
					
					</div>
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