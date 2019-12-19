<!DOCTYPE html>
<!--	Author: Clara Mefford
		Date:	  11/23/2019
		File:	  appointmentNotesEditor.php
		Purpose:  Editor for appointment notes.
-->
<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Appointment Notes</title>
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
		 
		 //recieve variables from form in AddAppointmentNotesForm
		 $patientID = $_POST["patientID"];
		 $appDate = $_POST["appDate"];
		 $appTime = $_POST["appTime"];
		 
		 //user query to get appointment notes from the appointment in question
		 $userQuery = "select appointmentNotes from appointmentnotes
inner join appointments on appointmentnotes.`appointmentID`=appointments.`appointmentID`
inner join patient on appointments.`patientID`=patient.`patientID`
where patient.`patientID`= ".$patientID." && appointments.`date`= '".$appDate."' && appointments.`time`= '".$appTime.":00'";
		 $appNotesResult = mysqli_query($connect, $userQuery);
		 $appointmentNotesRecord = mysqli_fetch_assoc($appNotesResult);
		 
		 $appointmentNotes = $appointmentNotesRecord["appointmentNotes"];
		 
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
      		<h2>Edit Notes</h2>
			<form action="commitNotes.php" method="post">
				Patient ID: <textarea readonly name="patientID"><?php echo $patientID ?></textarea></br>
				Appointment date: <textarea readonly name="appDate"><?php echo $appDate ?></textarea></br>
				Appointment time: <textarea readonly name="appTime"><?php echo $appTime ?></textarea></br>
				<textarea name="newNotes" rows="15" cols="30"><?php echo $appointmentNotes ?></textarea>
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
   		</br></br></br>
		<a href="addAppointmentNotesForm.php"><div><img class="logo" src="img/clipboard.png" alt="Logo"></div></a><a class="quicklink" href="addAppointmentNotesForm.php">Access Appointment Notes</a>
		</div>
		</div>
		<footer><p>&copy Copyright 2019 MentCare</p></footer>
	</body>
</html>