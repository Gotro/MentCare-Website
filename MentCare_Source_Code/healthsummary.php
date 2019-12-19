<?php
    session_start();
?>
<!DOCTYPE html>
<!--	Author: Susannah Lepley
		Date:	  11/07/2019
		File:	  login.html
		Purpose:  Create a form for a user to login with a login name and a password.
-->
<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Health Summary</title>
		<link rel="stylesheet" href="homepage.css">
	</head>
	<body>
		<body background="img/background.jpg">
	<?php
		// connecting the database to the html file
		$server = "localhost";
	    $user = "root";
	    $pw = "";
	    $db = "MentCare";
		$userID = $_SESSION['userID'];
		$connect = mysqli_connect($server, $user, $pw, $db);
		if(!$connect) {
			die("ERROR: Cannot connect to database $db on server $server using user name $user (".mysqli_connect_errno().", ".mysqli_connect_error().")");
		}
		$userQuery = "select userFirstName, userLastName from users where userID = ".$userID;
		$result = mysqli_query($connect, $userQuery);
		if (!$result) {
			die("Could not successfully run query ($userQuery) from $db: ".mysqli_error($connect) );
		}
		
		$patientName = mysqli_fetch_assoc($result);
		// pass in the patient first name and last name from the database 
		$firstName = $patientName['userFirstName'];
		$lastName = $patientName['userLastName']; 
		
		// this block of code is used to display everything in the header  
		echo ' <div class="header"> ';
		echo ' <a href="homepage.php"><div><img class="logo" src="img/logo.png" alt="Logo"></div></a> '; 
		echo ' <div class="link"> ';
		echo($firstName . " " . $lastName);
		echo ' </div><br> ';
        echo ' <a href="login.html"><div class="link"> ';
	    echo ' Logout';
	    echo ' </div></a></div>';
		?>
		<div class="row">
  		<div class="leftcolumn">
    		<div class="card">
      		<h2>Health Summary</h2>
		<h4>Please review your health issues, and verify that the list is up to date.<p style="color:red;">Call 911 if you have an emergency.</h4></h4>
		<?php
		$userQuery2 = "select medication.use
		from patient  
		inner join perscriptions on patient.patientID=perscriptions.patientID
		inner join medication on perscriptions.patientID=medication.medicationID
		where patient.userID =" .$userID;
		
		$result2 = mysqli_query($connect, $userQuery2);
		if (!$result2) {
			die("Could not successfully run query ($userQuery2) from $db: ".mysqli_error($connect) );
			echo '<p><br>There are no current health issues listed at this time.</p>';
		}
		
		$healthDetails = mysqli_fetch_assoc($result2);
		// this block of code is used to display the patient's diagnosises and conditions 
		$use = $healthDetails['use']; 
		
		echo '<div class="box">';
		echo '</b></h3></p><h4>Health Summary</h4>';
		echo ' You have ';
		echo($use);
		echo'</div>';
		?>
    		</div>
  		</div>

		<!--
		This block of code shows the quick links tab 
		--> 
  		<div class="rightcolumn">
    		<div class="card">
      		<h2>Quick Links</h2></br>
		<a href="prescriptions.php"><div><img class="logo" src="img/pill.png" alt="Logo"></div></a><a class="quickLink" href="prescriptions.php">Prescriptions</a>
		</br></br></br>
		<a href="viewAppointments.php"><div><img class="logo" src="img/calendar.png" alt="Logo"></div></a><a class="quickLink" href="viewAppointments.php">View Appointments</a>
		</br></br></br>
		<a href="healthSummary.php"><div><img class="logo" src="img/clipboard.png" alt="Logo"></div></a><a class="quickLink" href="healthSummary.php">Health Summary</a>
		</br></br></br>
		<a href="records.php"><div><img class="logo" src="img/folder.png" alt="Logo"></div></a><a class="quickLink" href="records.php">Records</a>
		</br></br>
   		</div>
		</div>
		<footer><p>&copy Copyright 2019 MentCare</p></footer>
	</body>
</html>