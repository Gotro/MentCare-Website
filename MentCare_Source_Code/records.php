<?php
    session_start();
?>
<!DOCTYPE html>
<!--	Author: Susannah Lepley
		Date:	  11/07/2019
		File:	  records.html
		Purpose:  Create a webpage for the patient to view their personal records.
-->
<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Records</title>
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
		if(!$connect) {
			die("ERROR: Cannot connect to database $db on server $server using user name $user (".mysqli_connect_errno().", ".mysqli_connect_error().")");
		}
		$userQuery = "select userFirstName, userLastName from users where userID = ".$userID;
		$result = mysqli_query($connect, $userQuery);
		if (!$result) {
			die("Could not successfully run query ($userQuery) from $db: ".mysqli_error($connect) );
		}
		
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
		?>
		<div class="row">
  		<div class="leftcolumn">
    		<div class="card">
      		<h2>Records</h2>
		<h4>Please review contact and personal information here. It may take 24 hours for the information to be updated in the legal medical record.</h4>
		<?php
		$userQuery2 = "select users.userFirstName, users.userLastName, users.address, users.phoneNumber
		from users 
		inner join patient on users.userID=patient.userID
		where patient.userID = " .$userID;
		
		$result2 = mysqli_query($connect, $userQuery2);
		if (!$result2) {
			die("Could not successfully run query ($userQuery2) from $db: ".mysqli_error($connect) );
			echo '<p><br>There are no records listed at this time.</p>';
		}
		
		$recordDetails = mysqli_fetch_assoc($result2);
		// this section is used to display the patient's records from the database
		$userFirstName = $recordDetails['userFirstName'];
		$userLastName = $recordDetails['userLastName'];
		$address = $recordDetails['address'];
		$phoneNumber = $recordDetails['phoneNumber'];		
		
		echo '<div class="box">';
		echo '</b></h3></p><h4>Record Summary</h4>';
		echo '<p>First Name: ';
		echo($userFirstName);
		echo '</p><p>Last Name: ';
		echo($userLastName);
		echo '</p><p>Address: ';
		echo($address);
		echo '</p><p>Phone Number: ';
		echo($phoneNumber);
		echo'</p></div>';
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