<?php
error_reporting(E_ALL);
ini_set( 'display_errors','1');
include_once 'database.php';
$con=new mysqli('cse-curly.cse.umn.edu', 'C4131F18***', '****','C4131F18***','3306' );
// Check connection
if (mysqli_connect_errno())
{
  echo 'Failed to connect to MySQL:' . mysqli_connect_error();
}

//You can replace the strings below with whatever passwords you would like
$name = "alpha";
$login = "alpha";
$password = 'bravo';

//NOTE, you can have more account names and logins than 2, but you need at least 1
mysqli_query($con,"INSERT INTO tbl_accounts (acc_name, acc_login, acc_password) VALUES ('".$name."','".$login."','". sha1($password)."');");
mysqli_close($con);

echo '<h1> Successfully Inserted Values into the Table </h1>'
?>
