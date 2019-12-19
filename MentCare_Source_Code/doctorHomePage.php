<?php
	session_start();
?>
<!--	Author: Clara Mefford
		Date:	  11/22/2019
		File:	  doctorHomepage.html
		Purpose:  Create a home page for the MentCare system that will be used by doctors.
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
		//connect to database with given credentials
		 $server = "localhost";
	      $user = "root";
	      $pw = "";
	      $db = "MentCare";
		  $userID = $_SESSION['userID'];
		$connect = mysqli_connect($server, $user, $pw, $db);
		//user query to get doctor name
		$userQuery = "select userFirstName, userLastName from users where userID = 1";
	$result = mysqli_query($connect, $userQuery);
	$patientName = mysqli_fetch_assoc($result);

	$firstName = $patientName['userFirstName'];
	$lastName = $patientName['userLastName']; 
	
	//user query to get doctor ID number
	$docIDQuery = "select doctorID from doctor where userID = ".$userID;
	$docIDResult = mysqli_query($connect, $docIDQuery);
	$docRecord = mysqli_fetch_assoc($docIDResult);
	$docID = $docRecord['doctorID'];
	
		//set up header
		echo ' <div class="header"> ';
		echo ' <a href="doctorHomepage.php"><div><img class="logo" src="img/logo.png" alt="Logo"></div></a> '; 
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
		
		//display calendar with appointments
		include 'MentCareDoctorCalendar.php';
		$server = "localhost";
		$user = "root";
		$pw = "";
		$db = "MentCare";

		$mentCareCalendar = new MentCareDoctorCalendar($server, $user, $pw, $db, $docID);
		echo $mentCareCalendar->show();
		?>
    		</div>
  		</div>

  		<div class="rightcolumn">
    		<div class="card">
      		<h2>Quick Links</h2></br>
		<a href="createPrescriptionForm.php"><div><img class="logo" src="img/pill.png" alt="Logo"></div></a><a class="quicklink" href="createPrescriptionForm.php">Create Prescription</a>
		</br></br></br>
   		</br></br></br>
		<a href="addAppointmentNotesForm.php"><div><img class="logo" src="img/clipboard.png" alt="Logo"></div></a><a class="quicklink" href="addAppointmentNotesForm.php">Access Appointment Notes</a>
		</div>
		</div>
		<footer><p>&copy Copyright 2019 MentCare</p></footer>
	
	</body>
</html>
<!DOCTYPE html>