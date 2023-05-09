<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add car</title>

    <!-- can't return back code if logged out -->

    <script type="text/javascript">

        function preventBack() { window.history.forward() };
        setTimeout("preventBack()", 0);
        window.onunload = function () { null; }

    </script>
    <style>
        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            height: 5%;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>

</html>

<?php
ob_start();
session_start();
include("AddCar.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_system";
$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST['cname'];
$plate_no = $_POST['plate_no'];
$model = $_POST['model'];
$warehouse_id = $_POST['warehouse_id'];
$color = $_POST['color'];
$price = $_POST['price'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM car WHERE plate_no='$plate_no'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

$sql1 = "SELECT * FROM warehouse WHERE warehouse_id='$warehouse_id'";
$result1 = mysqli_query($conn, $sql1);
$num1 = mysqli_num_rows($result1);

if ($num > 0) {
    // session_start();
    // $_SESSION['msg'] = 'Plate number already exists!';
    ?>
    <div class="alert" style="margin-top:0%">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Plate number already exists!
    </div>
    <!-- <div class="alert alert-danger" role="alert">
                *Plate number already exists!
            </div> -->

<?php
} else {
    $sql = "INSERT INTO `car`( `name`, `model`, `plate_no`, `Status`, `condition`, `is_paid`, `warehouse_id`, `color`, `price`) 
        VALUES('$name','$model','$plate_no', 'active', 'good', 'N', '$warehouse_id', '$color', '$price')";
    if ($conn->query($sql) == TRUE) {
        $sql2 = "UPDATE warehouse SET Avail_capacity =Avail_capacity + 1 WHERE warehouse_id='$warehouse_id'";
        $conn->query($sql2);
        $sql3 = "INSERT INTO `status`VALUES (now(),'active','good','$plate_no','not rented')";
        $conn->query($sql3);
        ?><br>
        <div class="alert alert-success" role="alert" style="margin-left: 18%;">
            Car Added!
        </div>

        <?php
        header('Location: AddCar.php');
        // echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
$conn->close();