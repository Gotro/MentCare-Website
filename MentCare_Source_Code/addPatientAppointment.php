<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Add Appointments</title>
		<link rel="stylesheet" href="homepage.css">
	</head>
	<body>
		<body background="img/background.jpg">
		<?php
		include 'MentCareClinicCalendar.php';
		 $server = "localhost";
	      $user = "root";
	      $pw = "";
	      $db = "MentCare";
		$connect = mysqli_connect($server, $user, $pw, $db);
		
		
		$patientID = $_POST["patientID"];
		$doctorID = $_POST['doctorID'];
		$date = $_POST['date'];
		$time = $_POST['appointmentTime'];
		
	
		$date = str_replace("-","", $date);
	
		$keys = array_keys($_POST);
		
		$userQuery = "select userFirstName, userLastName from users where userID = 1";
	$result = mysqli_query($connect, $userQuery);
	$patientName = mysqli_fetch_assoc($result);
        
		$appointmentQuery = "select appointmentID from appointments";
		$result = mysqli_query($connect, $appointmentQuery);
		$appointmentID = 3;
		while ($appointments = mysqli_fetch_array($result)) {
	        $appointmentID++;
		}
	$insertQuery = 'insert into appointments(appointmentID, `patientID`,`doctorID`, `date`, `time`)
values ('.$appointmentID.', '.$patientID.', '.$doctorID.', "'.$date.'", "'.$time.'" );';
        
		
		if ($connect ->query($insertQuery) == TRUE) {
		
		} else {
		    echo "Error";
			};

    
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
      		<h2> Appointments Added</h2>
			<?php
		    $server = "localhost";
	      $user = "root";
	      $pw = "";
	      $db = "mentcare";
			$metCareCalendar = new MentCareClinicCalendar($server, $user, $pw, $db);
            echo $metCareCalendar->show();
			?>
		<p><br> 
		
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