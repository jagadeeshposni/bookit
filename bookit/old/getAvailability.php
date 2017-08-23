
<html>
<head>
 <link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print"> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="./js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="./js/jquery.timepicker.css" />
<style type="text/css">
  label {
		float: left;
		width: 300px;
		text-align: right;
		padding-right: 12px;
		margin-bottom: 5px;
		}
	#bookingform {
		background-color: #CCCCCC;
		margin:auto;
		width: 60%;
	}
	#timeAvaliabilitySpace{
		float: center;
		text-align: center;
	}
  
  </style>
</head>


<?php
$inputDate = $_GET['inputDate'];
$floorno   = $_GET['floorno'];
//echo $floorno;
$dbhost     = 'localhost';
$dbname     = 'bookit';
$dbusername = 'admin';
$dbpassword = 'admin';
//echo $floorno;

$conn = mysql_connect('localhost', 'root', '') or die('Error in connecting to Mysql');
if ($conn) {
    $select_db = mysql_select_db($dbname) or die('Could not find the database');
    $select_query = "select from_time,to_time,booked_on,booked_by,project from booking_info where floor_no = '" . $floorno . "' and Date_format(date_to_book, '%m/%d/%Y')=" . "'$inputDate' order by 1 asc;";
    //echo $select_query;
    $result = mysql_query($select_query) or die('Select query failed !');
	
	if(mysql_num_rows ( $result ) > 0 ){
	echo "Bookings made on  " . $inputDate . ' for ' . $floorno . ' are as follows';
	echo "<table border=2>";
    echo "<tr><th>Start time</th><th>End time</th><th>Date of Booking</th><th>Booked by</th><th>Project name</th>";
    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        //printf("<br/>ID: %s  Name: %s", $row[0], $row[1]);  
        echo '<td>' . $row[0] . '</td><td>' . $row[1] . '</td>' . '<td>' . $row[2] . '</td>' . '<td>' . $row[3] . '</td>' . '<td>' . $row[4] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    }
    else{
    echo "<p>No Bookings made ! You free to bookit</p>";
    }
    //echo $inputDate;
    //echo  '<button onclick="bookit()">Bookit</button>';
    
    echo '';
}
?>
<body>
<!--<form name = "" action = "bookit.php" method="GET">
<input type="text" id ="fromtimepicker"/>
<input type="text" id ="totimepicker"/>
</form>
-->
</body>