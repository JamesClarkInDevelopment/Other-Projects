<?php

	include('secure/conn.php');

	$getcat = $conn->real_escape_string($_GET['filter']);
	
	$read = "SELECT * FROM elm_Products WHERE CatID = '$getcat'";
	
	$result = $conn->query($read);
	
	if(!$result){
	echo$conn->error;
	}
	
	$read2 = "SELECT * FROM elm_Category WHERE CatID = '$getcat'";
	$result2 = $conn->query($read2);
	
	if(!$result2){
	echo$conn->error;
	}
	
	$row =$result2->fetch_assoc();
	$cat = $row['Category'];
	

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
		
		<div class="container-fluid" id="products">
			
			<div class="row">
				<div class="col-lg text-center" >
					<h2 class="display-4" id ="MainTitles">Browse <?php echo $cat ; ?> for Sale</h2>
				</div>
				
			</div>
			
			
			<div class="row">
				<div class="col text-center " >
					
					<a class="btn btn-dark" href="products.php" role="button">All Items</a>
				</div>
				<div class="dropdown text-center">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product Type
					</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="category.php?filter=1">Cameras</a>
					<a class="dropdown-item" href="category.php?filter=2">Lenses</a>
					<a class="dropdown-item" href="category.php?filter=3">Lighting</a>
					<a class="dropdown-item" href="category.php?filter=4">Sound</a>
					<a class="dropdown-item" href="category.php?filter=5">Other</a>
				</div>
			</div>
			</div>
			<div class="row" id="filler">
			</div>
			
				<?php
						while($row =$result->fetch_assoc()){
								
								$name = $row['Title'];
								$price = $row['Price'];
								$Desc = $row['Description'];
								$img = $row['ImagePath'];
								$ID = $row['ProductID'];
				
								
							echo "<div class='row'>
									<div class='col-8 text-center border ' >
									<h4>Product: $name</h4>
									<h4>Price: £$price</h4>
									<a href='moreinfo.php?productID=$ID' class='btn btn-outline-dark btn-lg' role='button' aria-disabled='true'>MORE INFO</a>
									
								</div>
								<div class='col-4 text-center border' >
									<img class='img-fluid w-100 ' src='productimages/$img' id='tableProducts'>
								</div>
								</div>";
								
					
						}
					?>
			
		
			
		
			
			
		</div>
		
		<?php
			include('footer.php');
		?>	
		
		
		
		
		
		
	
	
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	</body>
</html>