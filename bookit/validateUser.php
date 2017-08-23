
<?php
	session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$select_query = "select user_name from users where password='".$password."'";
$dbhost     = 'localhost';
$dbname     = 'bookit';
$dbusername = 'admin';
$dbpassword = 'admin';

$conn = mysql_connect('localhost', 'root', '') or die('Error in connecting to Mysql');
if ($conn) {
    $select_db = mysql_select_db($dbname) or die('Could not find the database');
	$result = mysql_query($select_query) or die('Select query failed !');
	if(mysql_num_rows ( $result ) > 0 ){
	$_SESSION['username']= $username;
	header("Location: homepage.php" );
	}
	else{
	//echo '<script type="text/javascript">alert("Invalid credentials !");</script>';
	header("Location: index.php?info=loginfailed" );

	}
}
?>