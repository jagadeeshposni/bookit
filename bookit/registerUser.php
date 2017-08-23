<?php
session_start();
$regusername = $_POST['regusername'];
$regpassword1 = $_POST['regpassword1'];
//echo $regpassword1;
//

$insert_query = "INSERT INTO `users` (`user_key`, `user_name`, `password`) VALUES (NULL, '".$regusername."', '".$regpassword1."');";
$dbhost = 'localhost';
$dbname = 'bookit';
$dbusername = 'admin';
$dbpassword = 'admin';

$conn = mysql_connect('localhost','root','') or die('Error in connecting to Mysql');
if($conn){
$select_db = mysql_select_db($dbname) or die('Could not find the database');
//echo $insert_query;
$result = mysql_query($insert_query) or die('Could not register user');
$_SESSION['username'] = $regusername;
header("Location: homepage.php?username=".$regusername );
}
?>