<?php
    session_start();
?>
<!DOCTYPE html>
<!--	Author: Susannah Lepley
		Date:	  11/07/2019
		File:	  viewAppointments.html
		Purpose:  Create a webpage for the patient to view his or her current appointments.
-->
<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Appointments </title>
		<link rel="stylesheet" href="homepage.css">
	</head>
	<body>
		<body background="img/background.jpg">
		<?php
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

		$firstName = $patientName['userFirstName'];
		$lastName = $patientName['userLastName']; 
	
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
      		<h2>View Appointments</h2>
		<?php
		$userQuery2 = "select appointments.date, appointments.time
		from appointments 
		left join patient on appointments.patientID = patient.patientID 
		left join users on patient.userID = users.userID 
		where patient.userID =" .$userID;
		
		$result2 = mysqli_query($connect, $userQuery2);
		if (!$result2) {
			die("Could not successfully run query ($userQuery2) from $db: ".mysqli_error($connect) );
			echo '<p><br> There are no appointments listed at this time.</p>';
		}
		
		$appointmentDetails = mysqli_fetch_assoc($result2);

		$date = $appointmentDetails['date']; 
		$time = $appointmentDetails['time'];
		
		echo '<div class="box">';
		echo '</b></h3></p><h4>Appointment Details</h4>';
		echo ' Your next appointment is on ';
		echo($date);
		echo ' ';
		echo($time);
		echo'</div>';
		?>
    		</div>
  		</div>

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