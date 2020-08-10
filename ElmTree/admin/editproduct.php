<?php
	session_start();
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: ../login.php');
	}
	
	include('../secure/conn.php');
	
	
	
	if(isset($_GET['productID'])){
	$getID = $_GET['productID'];
	
	$read="SELECT * FROM elm_Products WHERE ProductID ='$getID'";
	
	
	$result= $conn -> query($read);
	} else {
		header('location: products.php');
	}
	
	if(!$result){
	echo$conn->error;
	}
	
	
	$read2="SELECT * FROM elm_Category";

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
		
		<h2 class="display-4 text-center" id ="MainTitles">Edit Product </h2>
		
		<div class="container-fluid" >
			
			<div class="row">
				<div class='col-1'>
				</div>
				<div class='col-10'>
				<?php
						while($row =$result->fetch_assoc()){
								
								$name = $row['Title'];
								$price = $row['Price'];
								$Desc = $row['Description'];
								$img = $row['ImagePath'];
								$ID = $row['ProductID'];
								$userID = $row['UserID'];
				
								
						echo "<div class='row'>
						
							<div class='col-8'>
							<form action='editedproduct.php' method='POST' enctype='multipart/form-data' >
							<input  type='hidden' value ='$ID'name='productID' >
							<label for='exampleInputPassword1'>Product Name</label>
							<input required='true' class='form-control' id='exampleInputPassword1' placeholder='$name' name='productname'>
						
						
							<label for='exampleInputPassword1'>Price</label>
							<input required='true' class='form-control' id='exampleInputPassword1' placeholder='$price' name='price'>
						
						
							<label for='exampleInputEmail1'>Description</label>
							<input required='true' class='form-control' id='exampleInputPassword1' placeholder='$Desc' name='desc'>
					
							<div class='form-group'>
										<label for='exampleFormControlSelect1'>Product Category</label>
										<select required='true'  class='form-control' id='exampleFormControlSelect1' name='category'>";
										
									
									  
											while($row =$result2->fetch_assoc()){
									
												$cat = $row['Category'];
												$catID = $row['CatID'];
												
												echo "<option>$catID) $cat</option>";
									  
											}
									
								echo"		</select>
								</div>
							</div>
						
							
						


						
									<div class='col-4 text-center border' >
										<img class='img-fluid w-100 ' src='../productimages/$img' id='footer'>
									</div>
								</div>";
								
					
						}
					?>     
					<p>Finished?</p>
					<input type='submit' class='btn btn-dark' value='UPDATE PRODUCT'></input>
					</form>
				</div>
				<div class='col-1'>
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