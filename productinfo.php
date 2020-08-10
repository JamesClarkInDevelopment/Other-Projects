<?php
	
	include('secure/conn.php');
	
	$displayid = $_GET['row'];
	
	$read="SELECT * FROM elm_NewProducts WHERE id='$displayid'";
	
	
	$result= $conn -> query($read);
	
	
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
		
		<h2 class="display-4 text-center" id ="MainTitles">Browse all equipment for sale</h2>
		
		<div class="container-fluid" id="products">
			
			
			<div class="row" id="filler">
			
			</div>
				<?php
						while($row =$result->fetch_assoc()){
								
								$name = $row['Title'];
								$price = $row['Price'];
								$Desc = $row['Description'];
								$img = $row['ImagePath'];
				
								
							echo "<div class='row'>
									<div class='col-lg text-center border' >
									<h3>Product: $name</h3>
									<h3>Price: £$price</h3>
									<p>Click image for more info</p>
								</div>
								<div class='col-md text-center border' >
									<a href='productinfo.php' ><img class='img-fluid w-100 btn btn-outline-dark' src='$img' id='tableProducts'></a>
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