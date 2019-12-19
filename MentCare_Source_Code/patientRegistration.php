<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Patient Registration</title>
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
		echo ' <a href="clinicHomepage.php"><div><img class="logo" src="img/logo.png" alt="Logo"></div></a> '; 
		echo ' <div class="link"> ';
		echo ' </div><br> ';
        echo ' <a href="login.html"><div class="link"> ';
	    echo ' Logout';
	    echo ' </div></a></div>';
		

		echo ' <div class="row"> ';
  		echo ' <div class="leftcolumn"> ';
    		echo ' <div class="card"> ';
      		echo ' <h2>Welcome!</h2> ';
		echo ' <h4>Register Patient</h4> ';
		
		$userQuery = 'select userID from users;';
		$result = mysqli_query($connect, $userQuery);
		$userID = 1;
		while($ids = mysqli_fetch_assoc($result)) {
		    $userID;
			
			
		}
		
		
		?>
		
		<form action = "patientRegistrationPage.php" method = "post">
		
		<p> <input type = "text" size = "20" name = "firstName">
		First Name
		<p> <input type = "text" size = "20" name = "lastName">
		Last Name
		<p> <input type = "text" size = "20" name = "loginName">
		Login Name
		<p> <input type = "password" size = "20" name = "password">
		PassWord
		<p> <input type = "text" size = "20" name = "address">
		Address
		<p> <input type = "text" size = "20" name = "phoneNumber">
		Phone Number
		<p> <input type="number" name="height">
		Height
		<p> <input type ="number" name = "weight">
		Weight
		<p> <input type = "text" name = "status">
		Status
		<p> <input type = "text" name = "medication">
		Medication
		<p> <input type = "text" name = "gender">
		Gender
		<p><input type = "submit">
		
		</form>
		
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
<!DOCTYPE html>