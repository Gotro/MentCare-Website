<!DOCTYPE html>
<!--	Author: Clara Mefford
		Date:	  11/22/2019
		File:	  createPrescription.html
		Purpose:  Process prescription creation.
-->
<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Create Prescription</title>
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
		 $connect = mysqli_connect($server, $user, $pw, $db);
		 
		 //accepts values from form in createPrescriptionForm
		 $docID = $_POST["docID"];
		 $patientID = $_POST["patientID"];
		 $appointID = $_POST["appointID"];
		 $medID = $_POST["medID"];
		 $dose = $_POST["dose"];
		 $creationDate = date('m/d/y', time());
		 $startDate = $_POST["startDate"];
		 $endDate = $_POST["endDate"];
		 
		 //query to commit prescription creation to database
		 $userQuery = "INSERT INTO perscriptions (medicationID, appointmentID, patientID, doctorID, date, dose, datestart, dateend) VALUES('$medID', '$appointID', '$patientID', '$docID', CURDATE(), '$dose', '$startDate', '$endDate')";
		 mysqli_query($connect, $userQuery);
		 
		 //set up header
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
      		<h2>Create Prescription</h2>
			<p>Prescription created! </p>
			<p>Date Created: <?php echo $creationDate ?>
			<table>
					<tr><th>Prescribing Doctor ID:</th><td><?php echo $docID ?></td></tr>
					<tr><th>ID of Patient to Receive Prescription:</th><td><?php echo $patientID ?></td></tr>
					<tr><th>ID of Appointment During Which Prescription Was Prescribed:</th><td><?php echo $appointID ?></td></tr>
					<tr><th>Medication ID:</th><td><?php echo $medID ?></td></tr>
					<tr><th>Dose:</th><td><?php echo $dose ?></td></tr>
					<tr><th>Start Date:</th><td><?php echo $startDate ?></td></tr>
					<tr><th>End Date</th><td><?php echo $endDate ?></td></tr>
				</table>
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