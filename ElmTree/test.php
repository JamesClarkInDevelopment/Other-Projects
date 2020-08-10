<?php

	include('secure/conn.php');
	echo "<p>This is a test page</p>"
	
	$displayid = $_GET['row'];
	
	$read="SELECT * FROM elm_colleges";
	$read2 = "SELECT * FROM elm_colleges WHERE id = '$displayid' ";
	
	$result= $conn -> query($read);
	
	if(!$result){
	echo$conn->error;
	}
	
	while($row =$result->fetch_assoc()){
			$uni = $row['University'];
			$rowid = $row['UniId'];
			
			echo "<div class='row  text-center '>
					<div class='col text-center'>
						<p>$uni </p>
					</div>
					<div class='col text-center'>
						<p>$rowid </p>
					</div>
				</div>";
		}



	include('footer.php');
?>