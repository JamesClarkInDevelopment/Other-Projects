<?php
session_start();
	include('../secure/conn.php');
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: ../login.php');
	}
	
	$username = $_SESSION['40083514_ElmTreeUser'];
	$profilepic = $_SESSION['40083514_ElmTreeProPic'];


	$read="SELECT * FROM elm_Products  ORDER BY Price Desc LIMIT 4";
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
		<link rel="stylesheet" href="../styles/styles.css">
		
	</head>
	
	<body>
	
		
		
		<?php
			include('nav1direcup.php');
			
		?>
		
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-lg text-center" >
					<h2 class="display-3">Hey <?php echo "$username!";  ?></h2>
				</div>
				
			</div>
			<div class="row">
				<div class="col-4 text-center" >
				</div>
				
				<div class="col-4 text-center "  >
				<?php
					echo "<img src='../productimages/$profilepic' id ='profilepic'>";
				?>
				</div>
				<div class="col-4 text-center" >
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-lg text-center" >
					<p class="display-5">Buy and Sell Student Camera Equipment</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg text-center" >
					<a href="add.php" class="btn btn-outline-dark btn-lg" tabindex="-1" role="button" aria-disabled="true">Add Product</a>
					<a href="profile.php" class="btn btn-outline-dark btn-lg" tabindex="-1" role="button" aria-disabled="true">Your Profile</a>
					
				</div>
				
			</div>
			<div class="row" >
				<div class="col-lg text-center" >
				<h2 class="display-3">Some Products for Sale</h2>
				</div>
			</div>
			
			<div class="row" id="filler">
				
			</div>
			
			
		<div class='row'>
		<?php
						
						while($row =$result->fetch_assoc()){
								
							$name = $row['Title'];
							$price = $row['Price'];
							$img = $row['ImagePath'];
							$ID = $row['ProductID'];
				
							$count=0;
						
						if($count<=4){
								
							echo 
									"<div class='col-3 text-center border' >
									<h4> $name</h4>
									<img class='img-fluid w-100 ' src='../productimages/$img' id='tableProducts'>
									<h4>Price: £$price</h4>									
									<a href='../moreinfo.php?productID=$ID' class='btn btn-outline-dark btn' role='button' aria-disabled='true'>MORE INFO</a>
									<div id='filler'>
			
									</div>
									</div>
								
								";
						}	
					
						}
					?>
			</div>
			<div id="filler">
			
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