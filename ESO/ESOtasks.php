<?php
	
	//On this webpage a simple form will be shown to the user where they can pick a date and when brought to the next page they will be 
	//given all of the individuals who will be working on that day/their crew and the task that they will be working on.
	
	session_start(); //start the webapp session
	
	include('secure/conn.php'); //connection to my database through login credentails// kept private for application process
	
	
	

?>

				<div class="dropdown text-center">
					<button class="btn btn-light btn-large btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Location Search
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<?php
								//populates location dropdown
								$nav= "SELECT * FROM Task_Table";
								$navresult = $conn->query($nav);
							
								
								if(!$navresult){
									echo $conn->error;
								}
								
								while($nav = $navresult->fetch_assoc()){
								
								$date = $nav['StartDate'];
								$taskID = $nav['ID'];
								
								echo "<a class='dropdown-item' href='viewalllocation.php?filter=$taskID'>$date</a>";
								
								}
							?>
					</div>
				</div>