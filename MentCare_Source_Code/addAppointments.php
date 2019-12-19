<!DOCTYPE html>
<!--	Author: Susannah Lepley
		Date:	  11/07/2019
		File:	  addAppointments.html
		Purpose:  Create a webpage for the clinic to add appointments.
-->
<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Add Appointments</title>
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
		echo ' <a href="ClinicHomePage.php"><div><img class="logo" src="img/logo.png" alt="Logo"></div></a> '; 
		echo ' <div class="link"> ';
		echo ' </div><br> ';
        echo ' <a href="login.html"><div class="link"> ';
	    echo ' Logout';
	    echo ' </div></a></div>';
		
		$patientQuery = "select patientID, userFirstName, userLastName from patient left join users
	                        on patient.userID = users.userID";
		$patientResult = mysqli_query($connect, $patientQuery);
		
		$doctorQuery = 'select doctorID, userFirstName, userLastName from doctor left join users
	                        on doctor.userID = users.userID';
		$doctorResult = mysqli_query($connect, $doctorQuery);

		
		?>

		<div class="row">
  		<div class="leftcolumn">
    		<div class="card">
      		<h2>Add Appointments</h2>
		<p><br> 
		<form action = "addPatientAppointment.php" method = "post">
		   Patient  <select name = 'patientID'> 
        <?php
				    while ($patients = mysqli_fetch_array($patientResult)) {
                    echo "<option value = '".$patients['patientID']."'>".$patients['userFirstName']." ".$patients['userLastName']."</option>";
    }
		?>
        </select>
		   <br> Doctor <select name = 'doctorID'>
			<?php
                    while ($doctors = mysqli_fetch_array($doctorResult)) {
                        echo "<option value = ".$doctors['doctorID'].">".$doctors['userFirstName']." ".$doctors['userLastName']."</option>";
                    }					
            			
			?>
		</select>
		<br>Appointment Date
		<input type = "date" name ="date" min = <?php echo date('y-m-d') ?>>
		<br>Select a Time : <input type = 'time' name = "appointmentTime">
		<input type ="submit">
		</form>
		</p>
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