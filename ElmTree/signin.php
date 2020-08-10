<?php
session_start();
	
	//if there are issure with login remove the if statement checking if user is signed in!
	include('secure/conn.php');
	
	if(!isset($_SESSION['40083514_ElmTreeUser'])){
		header('Location: login.php');
	}

	$user = $_POST['postuser'];
	$pass = md5($_POST['postpass']);
	
	
	
	//$checkuser = "SELECT * FROM elm_User WHERE Username = '$user' AND Password = '$pass'";
	
	
	//$checkuser = "SELECT elm_User.UserID, elm_User.UniID, elm_University.University,  elm_User.Username,  elm_User.Password,  elm_User.Email,  elm_User.Mobile,  elm_User.Instagram,  elm_User.ProfilePicture FROM elm_User, elm_University WHERE elm_User.Username = '$user' AND elm_User.Password = '$pass' LIMIT 1;";
	
	//If any issues revert to above statement
	//Below statement works for university but creates a lot of other errors! Left behind to cover other requirements. JB
	
	$checkuser = "SELECT elm_University.UniID, elm_University.University, elm_User.UserID, elm_User.Username,  elm_User.Password,  elm_User.Email,  elm_User.Mobile,  elm_User.Instagram,  elm_User.ProfilePicture FROM elm_University INNER JOIN elm_User ON elm_University.UniID = elm_User.UniID WHERE elm_User.Username = '$user' AND elm_User.Password = '$pass';";
	
	
	$result = $conn->query($checkuser);
	
	if(!$result){
		echo$conn->error;
	}
	
	$num = $result->num_rows;
	
	if($num>0){
		
		while($row=$result->fetch_assoc()){
			
			//User
			$myuser = $row['Username'];
			$myid = $row['UserID'];
			$myuni = $row['University'];
			$mypic = $row['ProfilePicture'];
			$myinsta = $row['Instagram'];
			$mymobile = $row['Mobile'];
			$myemail = $row['Email'];
			
			
			//Products
			$productpic = $row['ImagePath'];
			
			
			//User
			$_SESSION['40083514_ElmTreeUser']=$myuser;
			$_SESSION['40083514_ElmTreeID']=$myid;
			$_SESSION['40083514_ElmTreeUni']=$myuni;
			$_SESSION['40083514_ElmTreeProPic']=$mypic;
			$_SESSION['40083514_ElmTreeInsta']=$myinsta;
			$_SESSION['40083514_ElmTreeMobile']=$mymobile;
			$_SESSION['40083514_ElmTreeEmail']=$myemail;
			
			//Product
			$_SESSION['40083514_ElmTreeProductPic']=$productpic;
			
		}
		
		
		header('Location: admin/index.php');
		
	}else{
		header('Location: login.php');
	}

?>
