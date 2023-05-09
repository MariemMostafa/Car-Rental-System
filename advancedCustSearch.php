<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_system";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Connection Failed!";
    exit();
}
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$country_id = $_POST['country_id'];
$mobile_no = $_POST['mobile_no'];
// $bank_no=$_POST['bank_no'];
$sql = "SELECT * FROM `customers` WHERE 1 ";
if (!empty($fname) || !empty($lname) || !empty($email) || !empty($gender) || !empty($country_id) || !empty($mobile_no) || !empty($bank_no)) {
    if (!empty($fname)) {
        $sql .= "AND lower(`fname`) LIKE lower('%{$fname}%') ";
    }
    if (!empty($lname)) {

        $sql .= " AND lower(`lname`) LIKE lower('%{$lname}%') ";
    }
    if (!empty($email)) {
        $sql .= "AND lower(`email`) LIKE lower('%{$email}%') ";
    }
    if (!empty($gender)) {
        $sql .= "AND lower(`gender`) LIKE lower('%{$gender}%') ";
    }
    if (!empty($country_id)) {
        $sql .= "AND `country_id` LIKE '%{$country_id}%'";
    }
    if (!empty($mobile_no)) {
        $sql .= "AND `mobile_no` LIKE '{$mobile_no}%' ";
    }
    if (!empty($bank_no)) {
        $sql .= "AND `Bank_no`  LIKE '{$bank_no}%";
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "	<tr>			  
            <td>" . $row["fname"] . "</td>
            <td>" . $row["lname"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["gender"] . "</td>
            <td>" . $row["country_id"] . "</td>
            <td>" . $row["mobile_no"] . "</td>


		        </tr>";
        }
    } else {
        echo "<tr><td>0 result's found</td></tr>";
    }
}
?>