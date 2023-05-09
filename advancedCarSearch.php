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
$name = $_POST['name'];
$pno = $_POST['pno'];
$model = $_POST['model'];
$status = $_POST['status'];
$warehouse = $_POST['warehouse'];
$color = $_POST['color'];
$price = $_POST['price'];
$sql = "SELECT * FROM `car` WHERE 1 ";
if (!empty($pno) || !empty($name) || !empty($model) || !empty($status) || !empty($warehouse) || !empty($color) || !empty($price)) {
    if (!empty($pno)) {
        $sql .= "AND `plate_no` LIKE '%{$pno}%' ";
    }
    if (!empty($name)) {

        $sql .= " AND lower(`name`) LIKE lower('%{$name}%') ";
    }
    if (!empty($model)) {
        $sql .= "AND lower(`model`) LIKE lower('%{$model}%') ";
    }
    if (!empty($status)) {
        $sql .= "AND lower(`status`) LIKE lower('%{$status}%') ";
    }
    if (!empty($warehouse)) {
        $sql .= "AND lower(`warehouse_id`) LIKE lower('%{$warehouse}%')";
    }
    if (!empty($color)) {
        $sql .= "AND lower(`color`) LIKE lower('%{$color}%') ";
    }
    if (!empty($price)) {
        $sql .= "AND `price` between 0 and '$price' ";
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "	<tr>			  
            <td>" . $row["name"] . "</td>
            <td>" . $row["model"] . "</td>
            <td>" . $row["plate_no"] . "</td>
            <td>" . $row["Status"] . "</td>
            <td>" . $row["condition"] . "</td>
            <td>" . $row["is_paid"] . "</td>
            <td>" . $row["warehouse_id"] . "</td>
            <td>" . $row["color"] . "</td>
            <td>" . $row["price"] . "</td>

		        </tr>";
        }
    } else {
        echo "<tr><td>0 result's found</td></tr>";
    }
}
?>