<!DOCTYPE html>
<!--	Author: Clara Mefford
		Date:	  11/22/2019
		File:	  addAppointmentNotesForm.php
		Purpose:  Allow doctors to access appointment notes for patient appointments
-->
<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Remove Prescription</title>
		<link rel="stylesheet" href="homepage.css">
	</head>
	<body>
		<body background="img/background.jpg">
		<?php
		//connects to database with given credentials
		 $server = "localhost";
	     $user = "root";
	     $pw = "";
	     $db = "MentCare";
		 $connect = mysqli_connect($server, $user, $pw, $db);
		 
		 //set variables to null
		 $docID = "";
		 $patientID = "";
		 $appointID = "";
		 $appointmentDate = null;
		
		
		//display header
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
      		<h2>Add or Edit Notes</h2>
			<form action="appointmentNotesEditor.php" method="post">
				<table>
					<tr><th>ID of Patient:</th><td><input type="text" name="patientID"></td></tr>
					<tr><th>Appointment date:</th><td><input type="date" name="appDate"></td></tr>
					<tr><th>Appointment time:</th><td><input type="time" name="appTime"></td></tr>
				</table>
				<input type="submit">
			</form>
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