<?php
	session_start();
	include('secure/conn.php');
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: login.php');
	}
	
	if(isset($_GET['productID'])){
	$getID = $_GET['productID'];
	
	$read="SELECT * FROM elm_Products WHERE ProductID ='$getID'";
	
	
	$result= $conn -> query($read);
	
	} 
	
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
				<div class="col-2 text-center" >
				</div>
				
				<?php
						while($row =$result->fetch_assoc()){
								
								
								$img = $row['ImagePath'];
								$ID = $row['ProductID'];
								$name = $row['Title'];
				
								
							echo "<div class='col-6 text-center' >
									<h2 class='display-3'>Buy $name </h2>
									<h5 class='display-5'>Enter your Card details below</h5>
									</div>
							
							
								<div class='col-2 text-center border' >
									<img class='img-fluid w-100 ' src='productimages/$img' id='tableProducts'>
								</div>
								";
								
					
						}
					?>
				<div class="col-2 text-center" >
				</div>
			</div>
			
			
			<form action='purchased.php' method='POST' enctype='multipart/form-data' class="border">
				
				<div class="row justify-content-md-center ">
				<div class="col-8 text-center">
				
				
					<label for="exampleInputPassword1">Name on Card</label>
					<input  class="form-control" id="exampleInputPassword1" placeholder="E.g MR GORDON J FREEDOM" name="username">
				
				
					<label for="exampleInputPassword1">Long Number</label>
					<input type="form-control" class="form-control" id="exampleInputPassword1" placeholder="**** **** **** ****" name="password">
				
				
					<label for="exampleInputPassword1">Expiry Date</label>
					<input type="form-control" class="form-control" id="exampleInputPassword1" placeholder="month/year" name="password">
				
				
					<label for="exampleInputPassword1">Security Code</label>
					<input  class="form-control" id="exampleInputPassword1" placeholder="Three digits on the back" name="number">
				
	
				
					<label for='exampleFormControlSelect1'>Card Type</label>
					<select class='form-control' id='exampleFormControlSelect1'placeholder='Enter College' name="university">
						<option> Visa </option>
						<option> MasterCard</option>
						<option> Visa Debit </option>
						<option> American Express </option>
						
					</select>

					</div>
				</div>
				
				<div class="row  text-center ">
					<div class="col">
					
					</div>
					<div class="col-4  text-center">
						<p>Finished?</p>
						
						<?php
							echo "<a href='purchased.php?productID=$ID' class='btn btn-outline-dark btn-lg' role='button' aria-disabled='true' name'productID'>BUY</a>";
						?>
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