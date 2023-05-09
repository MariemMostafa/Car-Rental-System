<?php
session_start();
$servername= "localhost";
$username="root";
$password="";
$dbname="car_system";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
	echo "Connection Failed!";
	exit();
}
$reserve_id = $_POST['reserve_id'];
$start_date = $_POST['start_date'];
$End_date=$_POST['End_date'];
$plate_no=$_POST['plate_no'];
$is_paid=$_POST['is_paid'];
$paid_at=$_POST['paid_at'];
if (!empty($reserve_id) || !empty($start_date) || !empty($End_date) || !empty($plate_no) || !empty($is_paid) || !empty($paid_at)) {
    $sql = "SELECT * FROM `reservation` WHERE 1 ";
    if (!empty($reserve_id)) {
        $sql .= "AND `reserve_id` LIKE '{$reserve_id}%' ";
    }
    if (!empty($start_date)) {

        $sql .= " AND `start_date` = '$start_date'";
    }
    if (!empty($End_date)) {
        $sql .= "AND `End_date` = '$End_date' ";
    }
    if (!empty($plate_no)) {
        $sql .= "AND `plate_no` LIKE '{$plate_no}%' ";
    }
    if (!empty($is_paid)) {
        $sql .= "AND lower(`is_paid`) = lower('$is_paid') ";
    }
    if (!empty($paid_at)) {
        $sql .= "AND `paid_at` = '$paid_at' ";
    }

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "	<tr>			  
            <td>" . $row["reserve_id"] . "</td>
            <td>" . $row["start_date"] . "</td>
            <td>" . $row["End_date"] . "</td>
            <td>" . $row["plate_no"] . "</td>
            <td>" . $row["is_paid"] . "</td>
            <td>" . $row["paid_at"] . "</td>
		    </tr>";
        }
    } else {
        echo "<tr><td>0 Result's Found!</td></tr>";
    }
}
?>