<!DOCTYPE html>
<!--	Author: Clara Mefford
		Date:	  11/22/2019
		File:	  commitNotes.php
		Purpose:  Commit appointment note changes
-->
<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Appointment Notes</title>
		<link rel="stylesheet" href="homepage.css">
	</head>
	<body>
		<!-- sets background image -->
		<body background="img/background.jpg">
		<?php
		 //connects to database with given credentials
		 $server = "localhost";
	     $user = "root";
	     $pw = "";
	     $db = "MentCare";
		 $connect = mysqli_connect($server, $user, $pw, $db);
		 
		 //variables recieve parameters from form in appointmentNotesEditor
		 $patientID = $_POST["patientID"];
		 $appDate = $_POST["appDate"];
		 $appTime = $_POST["appTime"];
		 $appNotes = $_POST["newNotes"];
		 
		 //query to commit note changes
		$updateQuery = "update appointmentnotes
		inner join appointments on appointmentnotes.`appointmentID`=appointments.`appointmentID`
		inner join patient on appointments.`patientID`=patient.`patientID`
		SET appointmentnotes.appointmentNotes='".$appNotes."' 
		where patient.`patientID`= ".$patientID."
		&& appointments.`date`= '".$appDate."'
		&& appointments.`time`= '".$appTime.":00'";
		 $result = mysqli_query($connect, $updateQuery);
		
		//displays header
		echo ' <div class="header"> ';
		echo ' <a href="doctorHomePage.php"><div><img class="logo" src="img/logo.png" alt="Logo"></div></a> '; 
		echo ' <div class="link"> ';
		echo ' </div><br> ';
        echo ' <a href="login.html"><div class="link"> ';
	    echo ' Logout';
	    echo ' </div></a></div>';
		?>

		<div class="row">
  		<div class="leftcolumn">
    		<div class="card">
      		<h2>Notes updated!</h2>
			
    		</div>
  		</div>

  		<div class="rightcolumn">
    		<div class="card">
      		<h2>Quick Links</h2></br>
		<a href="createPrescriptionForm.php"><div><img class="logo" src="img/pill.png" alt="Logo"></div></a><a class="quicklink" href="createPrescriptionForm.php">Create Prescription</a>
		</br></br></br>
		<a href="removePrescriptionForm.php"><div><img class="logo" src="img/pill.png" alt="Logo"></div></a><a class="quicklink" href="removePrescriptionForm.php">Remove a prescription</a>
   		</div>
		</div>
		<footer><p>&copy Copyright 2019 MentCare</p></footer>
	</body>
</html>