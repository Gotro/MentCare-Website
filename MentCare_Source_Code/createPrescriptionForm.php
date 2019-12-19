<!DOCTYPE html>
<!--	Author: Clara Mefford
		Date:	  11/22/2019
		File:	  createPrescriptionForm.html
		Purpose:  Create a webpage for doctors to prescribe medications to patients.
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
		 
		 //initialize variables to null
		 $docID = "";
		 $patientID = "";
		 $appointID = "";
		 $medID = "";
		 $dose = "";
		 $startDate = null;
		 $endDate = null;
		
		
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
			<form action="createPrescription.php" method="post">
				<table>
					<tr><th>Prescribing Doctor ID:</th><td><input type="text" name="docID"></td></tr>
					<tr><th>ID of Patient to Receive Prescription:</th><td><input type="text" name="patientID"></td></tr>
					<tr><th>ID of Appointment During Which Prescription Was Prescribed:</th><td><input type="text" name="appointID"></td></tr>
					<tr><th>Medication ID:</th><td><input type="text" name="medID"></td></tr>
					<tr><th>Dose:</th><td><input type="text" name="dose"></td></tr>
					<tr><th>Start Date:</th><th>End Date</th></tr>
					<tr><th><input type="date" name="startDate"></th><th><input type="date" name="endDate"></th></tr>
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
		<a href="removePrescriptionForm.php"><div><img class="logo" src="img/pill.png" alt="Logo"></div></a><a class="quicklink" href="removePrescriptionForm.php">Remove a prescription</a>
   		</div>
		</div>
		<footer><p>&copy Copyright 2019 MentCare</p></footer>
	</body>
</html>