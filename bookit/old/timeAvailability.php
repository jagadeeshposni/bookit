<?php
$inputDate = $_GET['inputDate'];
$fromTime = $_GET['fromTime'];
$toTime = $_GET['toTime'];
$room = $_GET['room'];
$ft = strtotime($fromTime);
$tt = strtotime($toTime);

//echo $inputDate.$fromTime.$toTime;
$dbhost     = 'localhost';
$dbname     = 'bookit';
$dbusername = 'admin';
$dbpassword = 'admin';
//echo $floorno;

$conn = mysql_connect('localhost', 'root', '') or die('Error in connecting to Mysql');
if ($conn) {
    $select_db = mysql_select_db($dbname) or die('Could not find the database');
    $select_query = "select from_time,to_time from booking_info where floor_no = '" . $room . "' and Date_format(date_to_book, '%m/%d/%Y')=" . "'$inputDate' order by 1 asc;";
    //echo $select_query;
    $result = mysql_query($select_query) or die('Select query failed !');
	
	if(mysql_num_rows ( $result ) > 0 ){
		while ($row = mysql_fetch_array($result)) {
			$r1 = strtotime($row[0]);
			$r2 = strtotime($row[1]);
			if(( ($r1 <= $ft) && ($ft < $r2) ) || ( ($r1 < $tt) && ($tt <= $r2 )) || ( (($ft < $r1) && ($r1<$tt)) && ( ($ft < $r1) && ($r2<$tt) ) ) ){
			echo "There is a collision in timings. Please check and try again !";
			echo "<script> return false; </script>";
			break;
			}
			
		}
   
    }
   
}

?>