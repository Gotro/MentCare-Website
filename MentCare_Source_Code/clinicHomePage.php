<!--	Author: Susannah Lepley
		Date:	  11/07/2019
		File:	  clinicHomepage.html
		Purpose:  Create a home page for the MentCare system that will be used by the clinic.
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
		 $server = "localhost";
	      $user = "root";
	      $pw = "";
	      $db = "MentCare";
		$connect = mysqli_connect($server, $user, $pw, $db);
		$userQuery = "select userFirstName, userLastName from users where userID = 1";
	$result = mysqli_query($connect, $userQuery);
	$patientName = mysqli_fetch_assoc($result);

	$firstName = $patientName['userFirstName'];
	$lastName = $patientName['userLastName']; 
	
		echo ' <div class="header"> ';
		echo ' <a href="clinicHomepage.php"><div><img class="logo" src="img/logo.png" alt="Logo"></div></a> '; 
		echo ' <div class="link"> ';
		echo ' </div><br> ';
        echo ' <a href="login.html"><div class="link"> ';
	    echo ' Logout';
	    echo ' </div></a></div>';
		

		echo ' <div class="row"> ';
  		echo ' <div class="leftcolumn"> ';
    		echo ' <div class="card"> ';
      		echo ' <h2>Welcome!</h2> ';
		echo ' <h4>View Appointments</h4> ';
		
		include 'MentCareClinicCalendar.php';
		$server = "localhost";
		$user = "root";
		$pw = "";
		$db = "MentCare";

		$mentCareCalendar = new MentCareClinicCalendar($server, $user, $pw, $db);
		echo $mentCareCalendar->show();
		?>
    		</div>
  		</div>

  		<div class="rightcolumn">
    		<div class="card">
      		<h2>Quick Links</h2></br>
		<a href="addAppointments.php"><div><img class="logo" src="img/calendar.png" alt="Logo"></div></a><a class="quickLink" href="addAppointments.php">Add Appointment</a>
		</br></br></br>
		<a href="patientRegistration.php"><div><img class="logo" src="img/folder.png" alt="Logo"></div></a><a class="quickLink" href="patientRegistration.php">Patient Registration</a>
		</br></br>
   		</div>
		</div>
		<footer><p>&copy Copyright 2019 MentCare</p></footer>
	
	</body>
</html>
<!DOCTYPE html>