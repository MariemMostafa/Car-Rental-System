<?php
session_start();
include "config.php";
include "edit_car.php";
$carId = $_POST['platenumber'];

$condition = $_POST['selectStatus'];


$sql1 = "SELECT * FROM car WHERE plate_no = '$carId'";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) == 1) {
        //select status from car where plate number=carId
        while ($row3 = mysqli_fetch_array($result)) {
                $statuss=$row3["Status"];
                ?>
                <script>
                        console.log("status: <?php echo $statuss; ?>");
                </script>
                <?php
        }
        
        $sql3 = "INSERT INTO `status`(`status_date`,`Status`,`condition`,`plate_no`) VALUES (now(),'$statuss','$condition','$carId')";
        $conn->query($sql3);
        $sql = "UPDATE `car` SET `condition` = '$condition' WHERE `car`.`plate_no` = '$carId' ";
        if ($conn->query($sql) === TRUE) {
?>
<br>
<div class="alert alert-success" role="alert" style="margin-top: 5%;text-align:center;">
        Car condition edited.
</div>

<?php
        } else {
?>
<br>
<div class="alert alert-danger" role="alert">
        Error!!
</div>

<?php

        }
} else {
?>
<br>
<div class="alert alert-danger" role="alert">
        Car doesn't exist!!
</div>

<?php
}