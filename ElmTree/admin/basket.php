<?php 
session_start();
	
	include('../secure/conn.php');
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: ../login.php');
	}
	
	$UserID = $_SESSION['40083514_ElmTreeID'];
	$user = $_SESSION['40083514_ElmTreeUser'];
	
	
	//Closest Yet
	
	$testingread = "SELECT elm_Basket.BasketID, elm_Basket.UserID, elm_Basket.ProductID, elm_Products.ProductID, elm_Products.Title, elm_Products.Price, elm_Products.Description, elm_Products.ImagePath
	FROM `elm_Basket`
	INNER JOIN elm_Products ON elm_Basket.ProductID = elm_Products.ProductID
	WHERE elm_Basket.UserID = '$UserID';";
	
	$resultTestingRead = $conn -> query($testingread);
	
	
	if(!$testingread){
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
				<div class="col-1">
				</div>
				<div class="col-10">
					<div class="row" id="filler">
				
					</div>
					<div class="row">
						<div class="col-12">
							<?php echo "<h3 class='display-4 text-center '> $user's Purchased Products</h3>"; ?>
						</div>
					</div>
					<?php
							while($row =$resultTestingRead->fetch_assoc()){
								
								
								$name = $row['Title'];
								$price = $row['Price'];
								$img = $row['ImagePath'];
								$ID = $row['ProductID'];
								$desc = $row['Description'];

								
							echo "
							
							<div class='row'>
									<div class='col-8 text-center border' >
									<h4> $name</h4>
									<h5>Price: £$price</h5>
									<p>Description: $desc</p>
									
									</div>
									
									
									<div class='col-4 text-center border' >
										<img class='img-fluid w-100 ' src='../productimages/$img' id='tableProducts'>
									</div>
								</div>";
		
							}
					?>
				
					
					<p class= 'text-center' >Be sure to follow us on Instagram @ElmTree</p>
	
				
				</div>
				<div class="col-1">
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