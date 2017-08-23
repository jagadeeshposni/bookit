<?php

$username = $_POST['username'];
//$password = $_POST['password'];
$dbhost = 'localhost';
$dbname = 'bookit';
$dbusername = 'admin';
$dbpassword = 'admin';
//echo "Hello ".$username."!";
//echo "Hello ".$password."!";

$conn = mysql_connect('localhost','root','') or die('Error in connecting to Mysql');
if($conn){
$select_db = mysql_select_db($dbname) or die('Could not find the database');
$select_users_query = "select * from booking_info;";
//echo $select_users_query;
$result = mysql_query($select_users_query) or die('Could not find the user');

while ($row = mysql_fetch_array($result)) {
    //printf("<br/>ID: %s  Name: %s", $row[0], $row[1]);  
	echo '<br/>'.$row[0].'   '.$row[2];
}
//echo $fetch;
/*foreach ( mysql_fetch_array($fetch) as $row){
	 echo $row[0].'<br>';
}*/
}

?>	