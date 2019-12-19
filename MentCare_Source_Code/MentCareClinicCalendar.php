<?php


/*
Author: Ben Treine
The MentCare Clinic Calendar is a class that displays all of the appointments for every patient in the database
Parameters:
$aServer = the server the database is located
$aUser = the user needed to access the database
$aPassword = the password for the database
$aDatabase = the database for the mentcare system 
*/
class MentCareClinicCalendar {
    private $server;
	private $user;
	private $password;
	private $database;
	 private $connect;
	
	public function __construct($aServer, $aUser, $aPassword, $aDatabase) {
	    $server = $aServer;
		$user = $aUser;
		$password = $aPassword;
		$database = $aDatabase;
		$this->connect = mysqli_connect($server, $user, $password, $database);
		$this->naviHref = htmlentities($_SERVER['PHP_SELF']);
		
		if(!$this->connect) {
	   die("ERROR: Cannot connect to database $db on server $server using user name $user (".mysqli_connect_errno().", ".mysqli_connect_error().")");
	}
    $userQuery = "SELECT * FROM users";
	$result = mysqli_query($this->connect, $userQuery);
    if (!$result) 
    {
	die("Could not successfully run query ($userQuery) from $db: ".mysqli_error($connect) );
    }
    if (mysqli_num_rows($result) == 0) 
	    print("No records were found with query userQuery");
    else 
    { 
 	// process the result set
    }
		}
		
		
	private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
	
	/*
	The show function will draw the calendar to the patient page.
	
	*/
	public function show() {
        $year  = null;
         
        $month = null;
		 
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
			 
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
		
		//makes the previous and next buttons while displaying the month
		$content = '<table border = 1><tr>'.$this->_createNavi();
		//makes the day lables
		$content.= $this->_createLabels();
        $weeksInMonth = $this->_weeksInMonth($month,$year);
		 for( $i=0; $i<$weeksInMonth; $i++ ){
                          $content.="<tr>";           
                                    //Create days in a week
            for($j=1;$j<=7;$j++){
               $content.=$this->_showDay($i*7+$j);
                                    }
                                }
                                 
		
        $content.="</table>";
	
	    return $content;
    }
	private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
				
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;
             
			             $curDate = date('Ymd',strtotime($this->currentYear.$this->currentMonth.($this->currentDay)));
		    
			$appointmentQuery = "select * from appointments left join patient
	on appointments.patientID = patient.patientID left join users
	on patient.userID = users.userID where date = '".$curDate."'";
			
			
			$appointmentResults = mysqli_query($this->connect, $appointmentQuery);
			$cellContent = $this->currentDay."<br> Appointments: <br>";
			while($things = mysqli_fetch_assoc($appointmentResults)) {
			$cellContent = $cellContent."Time: ".$things['time']." ".$things['userFirstName']." ".$things['userLastName']."<br>";
			 }
			 
            $this->currentDay++;   
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }     
        return '<td>'.$cellContent;
        //return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
         //       ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
    }
	
	
	 private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return '<td><a href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a><td>'.
                date('M Y',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'<td>'.
                '<a href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
            '<tr>';
    }
	
	private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<td>'.$label;
 
        }
         
        return $content.'<tr>';
    }
	    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
	
	
}
?>