<?php
    session_start();
?>
<!DOCTYPE html>
<!--	Author: Susannah Lepley
		Date:	  11/07/2019
		File:	  homepage.html
		Purpose:  Create a home page for the MentCare system that will be used by the patient.
-->
<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Home</title>
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
		$userQuery = "select userFirstName, userLastName from users where userID = ".$userID;
		$result = mysqli_query($connect, $userQuery);
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
	
		// this block of code shows the main block in the website that is used to display information 
		echo ' <div class="row"> ';
  		echo ' <div class="leftcolumn"> ';
    	echo ' <div class="card"> ';
      	echo ' <h2>Welcome!</h2> ';
		echo ' <h4>With MentCare, you can connect with your doctor through a convenient, safe and secure environment.</h4><br> ';
		// this posts the calander to the webpage 
		include 'MentCarePatientCalendar.php';
		$server = "localhost";
		$user = "root";
		$pw = "";
		$db = "MentCare";
		$mentCareCalendar = new MentCarePatientCalendar($server, $user, $pw, $db, $userID);
		echo $mentCareCalendar->show();
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