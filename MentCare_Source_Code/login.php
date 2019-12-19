<?php
    session_start();
?>


<!DOCTYPE html>
<!--	Author: Susannah Lepley
		Date:	  11/07/2019
		File:	  login.php
		Purpose:  Create a form for a user to login with a login name and a password.
-->
<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Login Page</title>

	</head>
	<body>
		<?php
	    $loginName = $_POST['loginName'];
		$password = $_POST['password'];
		$passFile = fopen("pass.txt", "r");
		$loginArray = array();
		
    $server = "localhost";
	$user = "root";
	$pw = "";
	$db = "mentcare";
	$connect = mysqli_connect($server, $user, $pw, $db);
	if(!$connect) {
	   die("ERROR: Cannot connect to database $db on server $server using user name $user (".mysqli_connect_errno().", ".mysqli_connect_error().")");
	}
    $userQuery = "select userID, password, role from users where loginName = '".$loginName."'";
	$result = mysqli_query($connect, $userQuery);

    if (!$result) 
    {
	die("Could not successfully run query ($userQuery) from $db: ".mysqli_error($connect) );
    }
	
	 $userQuery = "select userID, password, role from users where loginName = '".$loginName."'";
	 $result = mysqli_query($connect, $userQuery);
	
	$credentialsArray = mysqli_fetch_assoc($result);
	$_SESSION['userID'] = $credentialsArray['userID'];
	
	if ($credentialsArray != null && $password == $credentialsArray['password']) {
	     
		if($credentialsArray['role'] == 'patient')  {
		   
		   echo header('Location: homepage.php');
			}
			elseif ($credentialsArray['role'] == 'receptionist') {
			echo header('Location: clinicHomepage.php');
			}
			  elseif  ($credentialsArray['role'] == 'doctor') {
				echo header('Location: doctorHomepage.php'); }
				
	}		else {
        echo "incorrect Password <a href = login.html> back </a>";
			}
    
		
	
		?>
	</body>
</html>
