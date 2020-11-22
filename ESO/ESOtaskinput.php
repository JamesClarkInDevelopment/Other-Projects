<?php
	
	session_start();
	
	include('secure/conn.php');
	

	
	//gets the chosen species ID
	$_GET['filter'];
	$getID = $_GET['filter'];
	
	$dateread ="SELECT * FROM Task_Table INNER JOIN AssignedTo_Table ON AssignedTo_Table.AssignedToID = Task_Table.AssignedToID WHERE StartDate = '$getID'";
	$resultdate= $conn -> query($dateread);
	
	if(!$resultdate){
	echo$conn->error;
	}
	
	$read2 = "SELECT * FROM Task_Table WHERE ID = '$getID'";
	$result2 = $conn->query($read2);
	
	if(!$result2){
	echo$conn->error;
	}
	
	//used for the loop
	$row =$result2->fetch_assoc();
	$datesearch = $row['StartDate'];
	

?>
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-12 text-center '>
					<table class="table" id="table">
						  <thead>
							<tr>
							  <th scope="col">Task</th>
							  <th scope="col">Description</th>
							  <th scope="col">Assigned To</th>
							  <th scope="col">Crew</th>
							  <th scope="col">Frequency</th>
							  <th scope="col">Date</th>
							</tr>
						  </thead>
						  <?php
							 if ($resultdate->num_rows > 0) {
							 
							 while($row =$resultdate->fetch_assoc()){
								
								$ID = $row['ID'];
								$task = $row['Task'];
								$desc = $row['Description'];
								$assignedTo = $row['AssignedToID'];
								$freq = $row['Frequency'];
								$date = $row['StartDate'];
								
								//Several queries to ouput the correct info to screen instead of ID numbers
								
								$readcrew = "SELECT * FROM Crew_Table WHERE CrewID = '$assignedTo'";				
								$resultAssignedTo= $conn -> query($readcrew);
								if(!$resultcrew){
									echo$conn->error;
									}
								$row =$resultcrew->fetch_assoc();
								$crew = $row['Name'];

								$readAssignedTo = "SELECT * FROM AssignedTo_Table WHERE CrewID = '$assignedTo'";				
								$resultAssignedTo= $conn -> query($readAssignedTo);
								if(!$resultAssignedTo){
									echo$conn->error;
									}
								$row =$resultAssignedTo->fetch_assoc();
								$assignedTo = $row['Name'];

							echo" <tbody>
								<tr>
								  <td>$Task</td>
								  <td>$description</td>
								  <td>$assignedTo</td>
								  <td>$crew</td>
								  <td>$frequency</td>
								  <td>$date</td>
								</tr>
							  </tbody>";
							 }
						 }
							 else{
							//if no results returned the user is notified
							echo"<h5 class='display-4 text-light text-center'> No Results</h5>";
						}
						  ?>
						</table>
				</div>
			</div>
		</div>