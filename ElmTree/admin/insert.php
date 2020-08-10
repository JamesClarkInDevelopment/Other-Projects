<?php
session_start();
	
	include('../secure/conn.php');
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: ../login.php');
	}
	
	
	$username= $_SESSION['40083514_ElmTreeUser'];
	$userid = $_SESSION['40083514_ElmTreeID'];
	$productpic = $_SESSION['40083514_ElmTreeProductPic'];

	$ran = rand(0,100);

	$title = $conn->real_escape_string($_POST['productpost']);
	$price = $conn->real_escape_string($_POST['price']);
	$desc = $conn->real_escape_string($_POST['description']);
	//new
	$category = $conn->real_escape_string($_POST['category']);
	
	$filename = $_FILES['uploadimg']['name'];
	$filename = $ran.$filename;
	
	$filetmp = $_FILES['uploadimg']['tmp_name'];
	
	$finddate = date("Y-m-d");
	
	move_uploaded_file($filetmp,"../productimages/".$filename);
	
	$insert = "INSERT INTO elm_Products (UserID,CatID,Title,Price,Description,ImagePath,Date) VALUES ('$userid','$category','$title','$price','$desc','$filename','$finddate')";
	
	
	if(!$insert){
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
			
			<div class="row text-center">
				<div class="col-12 text-center" >
					<?php
					
						$resultinsert= $conn -> query($insert);
						
						if(!$resultinsert){
						echo $conn->error;
					}	else {
						echo"<h2 class='display-3'>$title Added</h2>";
						echo"<img src='../productimages/$filename' id='profilepic'>";
					}
					
					?>
				
					<a href="add.php" class="btn btn-outline-dark btn-lg" tabindex="-1" role="button" aria-disabled="true">Add Another</a>
					
				</div>
				
			</div>
			<div class="row">
				<div class="col-12">
					
				</div>
			</div>
			<div class="row" id="filler">
				
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