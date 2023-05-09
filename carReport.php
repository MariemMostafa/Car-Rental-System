<html>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table.mytable {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            border-top: 2px solid black;
            border-bottom: 2px solid black;
            border-left: 2px solid black;
            border-right: 2px solid black;
        }

        table.mytable>thead>tr>th {
            font-size: large;
            border: 2px solid grey;
        }

        table.mytable>tbody>tr>td {
            border: 2px solid grey;
            color: #999;
        }
    </style>
    <script>
        function preventBack() { window.history.forward() };
        setTimeout("preventBack()", 0);
        window.onunload = function () { null; }
    </script>
</head>

<body>
    <div class="header">
        <h1>Car Report</h1>
    </div>
    <ul style="width:15%;">
        <li style="margin-top:20px;"><a>
                <?php $filepath = 'userr.png';
                echo '<img src="' . $filepath . '">';
                echo "admin"; ?>
            </a></li>
        <li><a href="page_admin.php">Home</a></li>
        <li><a href="AddCar.php">Add Car</a></li>
        <li><a href="searchTypes.php">Car Search</a>
        <li>
        <li class="nestedList"><a href="carSearches.php">Search By Car</a></li>
        <li class="nestedList"><a href="custSearches.php">Search By Customer</a></li>
        <li class="nestedList"><a href="resvsearches.php">Search By Reservation</a></li>
        </li>
        </li>
        <li><a href="edit_car.php">Edit Car Status</a></li>
        <li><a href="Login.html">Log Out</a></li>
    </ul>
</body>

</html>
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
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$custid = $_POST['custid'];

if ($_POST['report'] == 'reservation1') {
    $sql = mysqli_query($conn, "SELECT reservation.reserve_id,reservation.start_date,reservation.end_date,reservation.total_amount,customers.cid,customers.fname,customers.lname,customers.email,customers.gender,customers.country_id,customers.mobile_no
                                   ,car.name,car.model,car.color,car.plate_no
                            from reservation
                            NATURAL JOIN customers 
                            NATURAL JOIN car
                            WHERE start_date BETWEEN '$start_date' and '$end_date' OR End_date BETWEEN '$start_date' and '$end_date'
                            ORDER BY reserve_id
                            ") or die(mysqli_error($conn));
    echo "<table class='mytable' style='margin-left:15%; margin-top:2%; width:85%;'>";
    echo " <tr style='background:#282A35; font-color: white; font-weight:bold;'>";
    echo "<td style='color:white;'>Reservation ID</td>";
    echo "<td style='color:white;'>Start Date</td>";
    echo "<td style='color:white;'>Return Date</td>";
    echo "<td style='color:white;'>Amount to be paid</td>";
    echo "<td style='color:white;'>Customer ID</td>";
    echo "<td style='color:white;'>First Name</td>";
    echo "<td style='color:white;'>Last Name</td>";
    echo "<td style='color:white;'>Email</td>";
    echo "<td style='color:white;'>Gender</td>";
    echo "<td style='color:white;'>Country ID</td>";
    echo "<td style='color:white;'>Mobile Number</td>";
    echo "<td style='color:white;'>Car Name</td>";
    echo "<td style='color:white;'>Car Model</td>";
    echo "<td style='color:white;'>Car Color</td>";
    echo "<td style='color:white;'>Car Plate Number</td>";
    echo "</tr>";
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "	<tr>
            <td>" . $row["reserve_id"] . "</td>
            <td>" . $row["start_date"] . "</td>
            <td>" . $row["end_date"] . "</td>
            <td>" . $row["total_amount"] . "</td>	  
            <td>" . $row["cid"] . "</td>
            <td>" . $row["fname"] . "</td>
            <td>" . $row["lname"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["gender"] . "</td>
            <td>" . $row["country_id"] . "</td>
            <td>" . $row["mobile_no"] . "</td>
            <td>" . $row["name"] . "</td>
            <td>" . $row["model"] . "</td>
            <td>" . $row["color"] . "</td>
            <td>" . $row["plate_no"] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td>0 Result's Found!</td></tr>";
    }

}
if ($_POST['report'] == 'reservation2') {
    $sql = mysqli_query($conn, "SELECT car.name,car.model,car.plate_no,car.color,car.price,reservation.start_date,reservation.End_date
                            from car
                            NATURAL JOIN reservation
                            WHERE start_date BETWEEN '$start_date' and '$end_date'
                            ORDER BY start_date
                            ") or die(mysqli_error($conn));
    echo "<table class='mytable' style='margin-left:15%; margin-top:2%; width:85%;'>";
    echo " <tr style='background:#282A35; font-color: white; font-weight:bold;'>";
    echo "<td style='color:white;'>Car Name</td>";
    echo "<td style='color:white;'>Car Model</td>";
    echo "<td style='color:white;'>Car Plate Number</td>";
    echo "<td style='color:white;'>Car Color</td>";
    echo "<td style='color:white;'>Car Price</td>";
    echo "<td style='color:white;'>Reservation Start Date</td>";
    echo "<td style='color:white;'>Reservation End Date</td>";
    echo "</tr>";
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "	<tr>			  
                <td>" . $row["name"] . "</td>
                <td>" . $row["model"] . "</td>
                <td>" . $row["plate_no"] . "</td>
                <td>" . $row["color"] . "</td>
                <td>" . $row["price"] . "</td>
                <td>" . $row["start_date"] . "</td>
                <td>" . $row["End_date"] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td>0 Result's Found!</td></tr>";
    }


}

if ($_POST['report'] == 'payment') {
    $sql = mysqli_query($conn, "SELECT r.paid_at , sum(r.total_amount) AS 'Total Payment'
                            from reservation r
                            NATURAL RIGHT JOIN `car` c
                            WHERE r.paid_at BETWEEN '$start_date' and '$end_date' and r.is_paid='Y' 
                            GROUP BY r.paid_at
                            ORDER BY r.paid_at
                            ") or die(mysqli_error($conn));

    echo "<table class='mytable' style='margin-left:15%; margin-top:2%; width:85%;'>";
    echo " <tr style='background:#282A35; font-color: white; font-weight:bold;'>";
    echo "<td style='color:white;'>Payment Date</td>";
    echo "<td style='color:white;'>Total Payment</td>";
    echo "</tr>";

    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "	<tr>			  
                <td>" . $row["paid_at"] . "</td>
                <td>" . $row["Total Payment"] . "</td>
                </tr>";
        }
    }
}
if ($_POST['report'] == 'status') {

    $sql = mysqli_query($conn, "SELECT max(status_date) AS new_date,Status,status.condition,plate_no,pay_status FROM `status` 
    where status.status_date in (SELECT max(status_date) FROM `status`
    group by (plate_no)) AND status.status_date <= '$start_date'
    GROUP BY (plate_no);") or die(mysqli_error($conn));

    echo "<table class='mytable' style='margin-left:15%; margin-top:2%; width:80%;'>";
    echo " <tr style='background:#282A35; font-color: white; font-weight:bold;'>";
    echo "<td style='color:white;'>Date</td>";
    echo "<td style='color:white;'>Car Plate Number</td>";
    echo "<td style='color:white;'>Car Status</td>";
    echo "<td style='color:white;'>Car Condition</td>";
    echo "<td style='color:white;'>Rent status</td>";
    echo "</tr>";

    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "	<tr>			
                                <td>" . $row["new_date"] . "</td>
                                <td>" . $row["plate_no"] . "</td>
                                <td>" . $row["Status"] . "</td>
                                <td>" . $row["condition"] . "</td>
                                <td>" . $row["pay_status"] . "</td>
                                </tr>";
        }
    } else {
        echo "<tr><td>0 Result's Found!</td></tr>";
    }
    echo "</table>";

}
if ($_POST['report'] == 'reservation3') {
    $sql = mysqli_query($conn, "SELECT customers.cid,customers.fname,customers.lname,customers.email,customers.gender,customers.country_id,customers.mobile_no
                                   ,customers.Bank_no,car.name,car.model,car.plate_no
                            from customers
                            NATURAL JOIN reservation 
                            NATURAL JOIN car
                            WHERE cid = '$custid' 
                            ORDER BY cid
                            ") or die(mysqli_error($conn));
    echo "<table class='mytable' style='margin-left:15%; margin-top:2%; width:85%;'>";
    echo " <tr style='background:#282A35; font-color: white; font-weight:bold;'>";
    echo "<td style='color:white;'>Customer ID</td>";
    echo "<td style='color:white;'>First Name</td>";
    echo "<td style='color:white;'>Last Name</td>";
    echo "<td style='color:white;'>Email</td>";
    echo "<td style='color:white;'>Gender</td>";
    echo "<td style='color:white;'>Country ID</td>";
    echo "<td style='color:white;'>Mobile Number</td>";
    echo "<td style='color:white;'>Bank Number</td>";
    echo "<td style='color:white;'>Car Name</td>";
    echo "<td style='color:white;'>Car Model</td>";
    echo "<td style='color:white;'>Car Plate Number</td>";
    echo "</tr>";
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "	<tr>			  
            <td>" . $row["cid"] . "</td>
            <td>" . $row["fname"] . "</td>
            <td>" . $row["lname"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["gender"] . "</td>
            <td>" . $row["country_id"] . "</td>
            <td>" . $row["mobile_no"] . "</td>
            <td>" . $row["Bank_no"] . "</td>
            <td>" . $row["name"] . "</td>
            <td>" . $row["model"] . "</td>
            <td>" . $row["plate_no"] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td>0 Result's Found!</td></tr>";
    }


}

clearstatcache();
$_POST = array();
$conn->close();
?>