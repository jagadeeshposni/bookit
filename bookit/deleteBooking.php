<?php
$key = $_GET['key'];
//echo $key;
$dbhost = 'localhost';
$dbname = 'bookit';
$dbusername = 'admin';
$dbpassword = 'admin';

$conn = mysql_connect('localhost','root','') or die('Error in connecting to Mysql');
if($conn){
$select_db = mysql_select_db($dbname) or die('Could not find the database');
$del_query = "delete from booking_info where booking_info_key=".$key;
//echo $select_users_query;
$result = mysql_query($del_query) or die('Could not delete');
echo "Booking Undone !";
}
?>