
<link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print"> 
<script type="text/javascript">
function goback(){
window.location.href="homepage.php?username=bleh";
//window.history.back()
}
</script>
<?php
if(!isset($_POST['dateToBook'])) header("Location: homepage.php");
$dateToBook = $_POST['dateToBook'];
$fromTime = $_POST['fromTime'];
$toTime = $_POST['toTime'];
$username = $_POST['username'];
$floorNo = $_POST['floorNo'];
$project = $_POST['project'];
//echo $floorNo;
//echo;

//$time = strtotime('10/16/2003');

$dateInfo = date('Y-m-d',strtotime($dateToBook));
//echo time();
$dbhost = 'localhost';
$dbname = 'bookit';
$dbusername = 'admin';
$dbpassword = 'admin';

$conn = mysql_connect('localhost','root','') or die('Error in connecting to Mysql');
if($conn){
$select_db = mysql_select_db($dbname) or die('Could not find the database');
$insert_query = "INSERT INTO booking_info (`booking_info_key`, `floor_no`, `booked_on`, `date_to_book`, `from_time`, `to_time`, `booked_by`, `project`) VALUES (NULL, '".$floorNo."', '".date('Y-m-d G:i:s')."', '".$dateInfo."', '".$fromTime."',  '".$toTime."', '".$username."',  '".$project."');";
//echo $select_users_query;
$result = mysql_query($insert_query) or die('Could not find the user');
echo '

<label>Booking done on '.$dateToBook.' from '.$fromTime.' to '.$toTime.' for '.$floorNo.'</label>';
//echo'<input type="button" class="fssubmitbutton" value="back" onclick="goback()"/>';
header("Location: homepage.php?info=Booking Done !" );

}


?>