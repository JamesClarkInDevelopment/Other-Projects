<?php
	
	include('secure/conn.php');
	
	
	
	$read="SELECT * FROM elm_Products";
	$result= $conn -> query($read);
	
	if(!$result){
	echo$conn->error;
	}
	
	$readfilter = "SELECT elm_Products.ProductID, elm_Category.Category, elm_Products.Title, elm_Products.CatID FROM elm_Products
	INNER JOIN elm_Category ON elm_Category.CatID = elm_Products.CatID";
	$resultfilter= $conn -> query($readfilter);
	
	if(!$resultfilter){
	echo$conn->error;
	}
	
	$output ='';
	$header ='';
	if(isset($_POST['search'])){
		
		$searchq = $_POST['search'];
		
		$query = ("SELECT * FROM elm_Products WHERE Title LIKE '%$searchq%' OR Description LIKE '%$searchq%' ");
		$resultquery = $conn -> query($query);
		
		
			while($row = $resultquery->fetch_assoc()){
				$Title = $row['Title'];
				$Desc = $row['Description'];
				$ID = $row['ProductID'];

				$header = "<h2 class='display-4 text-center' id ='MainTitles'>Search Results</h2>";
				$output .="<div>$Title-$Desc</div><a href='moreinfo.php?productID=$ID class='btn btn-outline-dark ' role='button' aria-disabled='true'>MORE INFO</a>";
				
			}
		
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
		
		<h2 class="display-4 text-center" id ="MainTitles">Browse all Equipment for Sale</h2>
		
		<div class="container-fluid" id="products">
			<div class="row">
				
				<div class="col text-center " >
				
					
					<form action="products.php" method="post">
						<input required = 'true' type="text" name= "search" placeholder ="Search Products">
						<input class="btn btn-dark" type="submit" value="Go">
					</form>
					
					<?php
						echo $header;
						echo $output;
					?>
					
					<a class="btn btn-dark"  href="admin/add.php" role="button">Add Product</a>
				</div>
				<div class="dropdown text-center">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product Type
					</button>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<?php
						$nav= "SELECT * FROM elm_Category";
						$navresult = $conn->query($nav);
						
						if(!$navresult){
							echo $conn->error;
						}
						
						while($nav = $navresult->fetch_assoc()){
						
						$cat = $nav['Category'];
						$catID = $nav['CatID'];
						
						echo "<a class='dropdown-item' href='category.php?filter=$catID'>$cat</a>";
						
						}
					?>
						
					</div>
				</div>
			</div>
			<div class="row" id="filler">
			</div>
			
				<?php
						while($row =$result->fetch_assoc()){
								
								$name = $row['Title'];
								$price = $row['Price'];
								$img = $row['ImagePath'];
								$ID = $row['ProductID'];
				
								
							echo "<div class='row'>
									<div class='col-8 text-center border' >
									<h4> $name</h4>
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