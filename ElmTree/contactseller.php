<?php
session_start();
	
	include('secure/conn.php');
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: login.php');
	}
	
	if(isset($_GET['userID'])){
	$getuserID = $_GET['userID'];
	
	//$read="SELECT * FROM elm_User WHERE UserID ='$getuserID'";
	$read = "SELECT elm_University.UniID, elm_University.University, elm_User.UserID, elm_User.Username,  elm_User.Password,  elm_User.Email,  elm_User.Mobile,  elm_User.Instagram,  elm_User.ProfilePicture FROM elm_University INNER JOIN elm_User ON elm_University.UniID = elm_User.UniID WHERE elm_User.UserID = '$getuserID' ;";
	
	
	$result= $conn -> query($read);
	
	
	$row =$result->fetch_assoc();
	$userID = $row['UserID'];
	$user = $row['Username'];
	$email = $row['Email'];
	$mobile = $row['Mobile'];
	$uni = $row['University'];
	$insta = $row['Instagram'];
	$propic = $row['ProfilePicture'];
	
	} 
	
	if(!$read){
		echo$conn->error;
	}
	
	$readproducts="SELECT * FROM elm_Products WHERE UserID = '$userID'";
	
	$resultproducts= $conn -> query($readproducts);

	if(!$resultproducts){
	echo$conn->error;
	}
	
	
	
	
	//$userID = $_SESSION['40083514_ElmTreeID'];

	//echo $user.$pass.$email.$number.$uni.$instagram
	

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
				<div class="col-8">
					<div class="row" id="filler">
				
					</div>
					<?php
							$result= $conn -> query($read);
							
							if(!$result){
							echo $conn->error;}
							else{
								echo"<h3 class='display-4 text-center'>$user's Profile</h3> 
								<p class= 'text-center'>Email: $email</p>
								<p class= 'text-center'>University: $uni</p>
								<p class= 'text-center'>Mobile: $mobile</p>
								<p class= 'text-center'>Instagram: $insta</p> 
								
								<form action='admin/messagesent.php' method='POST' enctype='multipart/form-data' class='text-center'>
									<label for='exampleFormControlTextarea1'>Send $user a Message</label>
									<textarea class='form-control' id='exampleFormControlTextarea1' rows='3' name='message'></textarea>
									<p>Send Message</p>
									<input type='submit' class='btn btn-dark'></input>
								</form>";
							}
					?>
				
					
					<p class= 'text-center' >Be sure to follow us on Instagram @ElmTree</p>
					
					
					
				<div class="row text-center">
					<div class="col-12">	
						<h3 class='display-4 text-center'>Some of <?php echo "$user's"?> Products</h3>
						
						<?php
								while($row =$resultproducts->fetch_assoc()){
								if(!$readproducts){
								echo $conn->error;}	
									
								
								$name = $row['Title'];
								$price = $row['Price'];
								$img = $row['ImagePath'];
								$ID = $row['ProductID'];
				
								
							echo "<div class='row'>
									<div class='col-8 text-center border' >
									<h4> $name</h4>
									<h4>Price: £$price</h4>
									
									<a href='moreinfo.php?productID=$ID' class='btn btn-outline-dark btn-lg' role='button' aria-disabled='true'>More Info</a>
									
									</div>
									
									
									<div class='col-4 text-center border' >
										<img class='img-fluid w-100 ' src='productimages/$img' id='tableProducts'>
									</div>
								</div>";
								
					
							}
						?>
					</div>	
				</div>		
				
				</div>
				
				<div class="col-4">
					<?php echo " <img src='productimages/$propic' id='productGrid'>"; ?>
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