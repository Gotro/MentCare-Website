<html>
<head>

<title> Test</title>
</head>
<body>
<?php

include 'MentCareClinicCalendar.php';
include 'MentCarePatientCalendar.php';
include 'MentCareDoctorCalendar.php';
		  $server = "localhost";
	      $user = "root";
	      $pw = "";
	      $db = "mentcare";
			$metCareCalendar = new MentCareClinicCalendar($server, $user, $pw, $db);
            echo $metCareCalendar->show();

		$pCal = new MentCarePatientCalendar($server, $user, $pw, $db, 1);
         echo $pCal ->show();		
		 $dCal = new MentCareDoctorCalendar($server, $user, $pw, $db, 1);
		 echo $dCal ->show();

?>



</body>
</html>