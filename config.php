<?php  

$sname = "localhost";
$uname = "root";
$password = "";
$db = "car_system";
$conn = mysqli_connect($sname, $uname, $password, $db);

if (!$conn) {
	echo "Connection Failed!";
	exit();
}
?>