<?php
	
	
	
	if($_GET['q']!==''){
		
	include('secure/conn.php');
	

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
		
		<h2 class="display-4 text-center" id ="MainTitles">Search for a Product</h2>
		
		<div class="container-fluid" id="products">
			<div class="row">
				
				<div class="col text-center " >
					<form action ="searchPage.php" method ="GET" id="searchForm" class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" id="searchBox" name="q" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
					<?php
					
					$read = ("SELECT * FROM elm_Products WHERE Title LIKE '$q' OR Description LIKE '$q'");
					$result = $conn->query($read);
					
								
						while($row = $result->fetch_assoc()){
									
						$name = $row['Title'];
						$ID = $row['ProductID'];
						$desc = $row['Description'];
						$img = $row['ImagePath'];
						$price = $row['Price'];
						
						} echo "<div class='row'>
									<div class='col-8 text-center border' >
									<h4> $name</h4>
									<h4> Price: $$price</h4>
									<p>Desc: $desc</p>
									
									<a href='moreinfo.php?productID=$ID' class='btn btn-outline-dark btn-lg' role='button' aria-disabled='true'>MORE INFO</a>
								</div>
								<div class='col-4 text-center border' >
									<img class='img-fluid w-100 ' src='productimages/$img' id='tableProducts'>
								</div>
								</div>";
						
					?>
				</div>
			</div>
			<div class="row" id="filler">
			</div>
			
				
			
		</div>
		
		<?php
			include('footer.php');
	}
		?>
		
		
		
		
		
		
	
	
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	</body>
</html>