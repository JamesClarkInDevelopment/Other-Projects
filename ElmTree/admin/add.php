<?php
session_start();
	include('../secure/conn.php');
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: ../login.php');
	}
	
	$user = $_SESSION['40083514_ElmTreeUser'];
	$userid = $_SESSION['40083514_ElmTreeID'];
	$useruni = $_SESSION['40083514_ElmTreeUni'];
	
	$read = "SELECT * FROM elm_Category";
	
	$result = $conn->query($read);
	
	if(!$read){
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
		
		<h2 class="display-4 text-center" id ="MainTitles">Add Product</h2>
		
		<div class="container-fluid" id="products">
			<div class="row">
				<div class="col text-center " >
				
				<form action='insert.php' method='POST' enctype='multipart/form-data'>
				
					<div class="row justify-content-md-center ">
						<div class="col-8 text-center">
							<p><?php 
							echo "$user ";	
							 						
							
							?> </p>
							<label for="exampleInputPassword1">Product Name</label>
							<input  class="form-control" name='productpost' id="exampleInputPassword1" placeholder="Enter Product Name"  type="text">
							 
							 <div class="form-group">
								<label for="exampleFormControlSelect2">Type of Product</label>
								<select multiple class="form-control" id="exampleFormControlSelect2" name='category'>
		
							
							  <?php
									while($row =$result->fetch_assoc()){
							
										$cat = $row['Category'];
										$catID = $row['CatID'];
										
										echo "<option>$catID) $cat</option>";
							  
									}
							?>
								</select>
							</div>
							  
							<label for="exampleInputPassword1">Price</label>
							<input  class="form-control" name="price" id="exampleInputPassword1" placeholder="e.g. 50.99" type="text">
						
							<label for="exampleFormControlTextarea1">Description</label>
							<textarea class="form-control" name ="description" id="exampleFormControlTextarea1" rows="3" placeholder="Describe your product" type="text"></textarea>
						
							<label for="exampleFormControlFile1">Product Picture</label>
							<input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadimg">
		
							<div class="row  text-center ">
								<div class="col">
								
								</div>
								<div class="col-4  text-center">
									<p>Finished?</p>
									<button type="submit" class="btn btn-dark">Add Product</button>
								</div>
							
								<div class="col" >
								
								</div>
								
							</div>
						</div>
					</div>
				
				</form>
					
				
			
			<div class="row" id="filler">
				
			</div>
			</div>
		</div>		
			
		</div>
		
		<?php
			include('../footer.php');
		?>
		
		
		
		
		
		
	
	
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	</body>
</html>