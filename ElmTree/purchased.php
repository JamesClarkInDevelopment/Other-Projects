<?php
	session_start();
	include('secure/conn.php');
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: ../login.php');
	}
	

	if(isset($_GET['productID'])){
	$getID = $_GET['productID'];
	
	} 
	
	
	$username= $_SESSION['40083514_ElmTreeUser'];
	$userID = $_SESSION['40083514_ElmTreeID'];

	$insert = "INSERT INTO elm_Basket (UserID,ProductID) VALUES ('$userID','$getID')";

	if(!$insert){
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
				
				
				
				<div class="col text-center" >
					
					<?php 
						
						$resultinsert= $conn -> query($insert);
						
							if(!$resultinsert){
							echo $conn->error;
						}	else {
							echo"<h2 class='display-3'>Purchased</h2>";
							
						}
					?>
					
					<h5 class="display-5">Rate Your Seller</h5>
				</div>
			</div>
				<form action='products.php' >
				<div class="row">
					<div class="col text-center" >
					<div class="form-check form-check-inline" href ="#">
						<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
						<label class="form-check-label" for="inlineRadio1">1 Star</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option2">
						<label class="form-check-label" for="inlineRadio2">2 Star</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option3">
						<label class="form-check-label" for="inlineRadio3">3 Star</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option4">
						<label class="form-check-label" for="inlineRadio4">4 Star</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option5">
						<label class="form-check-label" for="inlineRadio5">5 Star</label>
					</div>
						<input type="submit" class="btn btn-dark " name="formsubmit" value="Submit Rating"></input>
					</div>
				</div>
				</form>
				
				<?php 
				
				if(isset ($_POST['formsubmit'])){
					
					$submit = $_POST['formsubmit'];
					$insert = "INSERT INTO elm_Rating (Rating) VALUES ('$submit')";
					
					$resultinsert= $conn -> query($insert);
						
					if(!$resultinsert){
						echo $conn->error;
					} else {
						echo"<h2 class='display-3'>Thanks For Rating</h2>";
						echo"
							<a class='btn btn-dark text-center'  href='admin/profile.php' role='button'>Profile</a>
						";
					}
					
				}
				
				
				?>
			
				
			
			
			
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