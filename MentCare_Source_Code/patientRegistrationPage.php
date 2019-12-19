<link rel="shortcut icon" type="image/png" sizes="16x16" href="img/favicon.png">
<html>
	<head>
		<title>MentCare - Patient Registration</title>
		<link rel="stylesheet" href="homepage.css">
	</head>
	<body>
		
		<body background="img/background.jpg">
		<?php
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$loginName = $_POST['loginName'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$phoneNumber = $_POST['phoneNumber'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$status = $_POST['status'];
		$medication = $_POST['medication'];
		$gender = $_POST['gender'];
		
	
		
		
		
		 $server = "localhost";
	      $user = "root";
	      $pw = "";
	      $db = "MentCare";
		$connect = mysqli_connect($server, $user, $pw, $db);
		$userQuery = "select userFirstName, userLastName from users where userID = 1";
	$result = mysqli_query($connect, $userQuery);
	$patientName = mysqli_fetch_assoc($result);
	
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
		    $userID++;
		}
		$pQuery = 'select patientID from patient';
		 $result = mysqli_query($connect, $pQuery);
		 $patientID = 1;
		 while($ids = mysqli_fetch_assoc($result)) {
		    $patientID++;
		}
		$insertUserQuery = "insert into users(userID, `userFirstName`,`userLastName`, password, `role`, `loginName`, address, `phoneNumber`)
        values (".$userID.", '".$firstName."', '".$lastName."', '".$password."', 'patient', '".$loginName."', '".$address."', '".$phoneNumber."');";
        
	

		$insertPatientQuery = "insert into patient(userID, `patientID`,height, weight, status, medications, gender)
                                values (".$userID.", ".$patientID.", ".$height.", ".$weight.", '".$status."', '".$medication."','".$gender."');";
								
							

		if ($connect ->query($insertUserQuery) == TRUE) {
		        echo "New Patient Registered";
				if ($connect ->query($insertPatientQuery) == TRUE) {
				}
		        } else {
		    echo "error";
			}
		
		?>
		
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