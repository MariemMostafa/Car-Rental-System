<?php
session_start();
?>
<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset="UTF-8">
    <title>Car renting</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="style1.css">
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
            border: 1px solid #dddddd;
        }

        table.mytable>tbody>tr>td {
            border: 1px solid #dddddd;
            color: #999;
        }

        p {
            width: 100px;
            height: 100px;
            background-color: red;
            position: relative;
            animation-name: example;
            animation-duration: 4s;
            animation-iteration-count: infinite;
        }

        @keyframes example {
            0% {
                background-color: red;
                left: 0px;
                top: 0px;
            }

            25% {
                background-color: yellow;
                left: 200px;
                top: 0px;
            }

            50% {
                background-color: blue;
                left: 200px;
                top: 200px;
            }

            75% {
                background-color: green;
                left: 0px;
                top: 200px;
            }

            100% {
                background-color: red;
                left: 0px;
                top: 0px;
            }
        }
    </style>

    <script type="text/javascript">
        function preventBack() { window.history.forward() };
        setTimeout("preventBack()", 0);
        window.onunload = function () { null; }
    </script>

    <div class="header">
        <h1>Search</h1>
    </div>

</head>


<body>

    <section style="float:left; display:inline; width: 13%;">
        <ul>
            <li style="margin-top:30px"><a>
                    <?php
                    $filepath = 'userr.png';
                    echo '<img src="' . $filepath . '">';

                    if (isset($_SESSION['name'])) {
                        echo $_SESSION['name'];
                    }

                    ?>
                </a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="user.php">Car Search</a></li>
            <li><a href="payment.php">Payment</a></li>
            <li><a href="contactUs.html">Contact Us</a></li>
            <li><a href="aboutUs.html">About Us</a></li>
            <li><a href="Login.html">Log Out</a></li>
        </ul>
    </section>

    <section class="col-12 col-sm-6 col-md-3"
        style="float:left; display:inline; width: 33%; margin-left: 15%;margin-top:5%;">

        <!-- </body>     -->

        <div class="container" style="color: black">
            <h1>Search</h1>
        </div>

        <form class="form-inline" style="display: inline;" name="search" id="search" method="post">
            <input type="text" placeholder="Car Name" id="searchN" class="form-control"><br>
            <input type="text" placeholder="Car Model" id="searchM" class="form-control"><br>
            <input type="text" placeholder="Car Colour" id="searchC" class="form-control"><br>
            <input type="text" placeholder="Car price" id="searchP" class="form-control"><br>
        </form>


        <div class="container" style="color:black;">
            <h1>Reserve</h1>
        </div>

        <form name="reserve" id="reserve" method="post" onsubmit="return validateReservationForm()">
            <input type="text" placeholder="Enter car plate number" id="carplate" name="carplate"
                class="form-control"><br>
            <b><label for="car id">Start date</label></b><br>
            <input type="date" id="startDate" name="startDate" class="form-control">
            <b><label for="car id">Return date </label></b><br>
            <input type="date" id="endDate" name="endDate" class="form-control"><br>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-lg btn-primary" type="submit" name="Reserve" id="Reserve">Reserve</button>
                <h6>Confirm payment? <a href="payment.php">Payment</a></h5>
            </div>
        </form>


        <div class="street">
            <div class="car" style="margin-top:10%;">
                <!--<div class="car-base"></div>-->
                <div class="car-body">
                    <div class="car-top-back">
                        <div class="back-curve"></div>
                    </div>
                    <div class="car-gate"></div>
                    <div class="car-top-front">
                        <div class="wind-sheild"></div>
                    </div>
                    <div class="bonet-front"></div>
                    <div class="stepney"></div>
                </div>
                <div class="boundary-tyre-cover">
                    <div class="boundary-tyre-cover-back-bottom"></div>
                    <div class="boundary-tyre-cover-inner"></div>
                </div>
                <div class="tyre-cover-front">
                    <div class="boundary-tyre-cover-inner-front"></div>
                </div>
                <div class="base-axcel">

                </div>
                <div class="front-bumper"></div>
                <div class="tyre">
                    <div class="gap"></div>
                </div>
                <div class="tyre front">
                    <div class="gap"></div>
                </div>
                <div class="car-shadow"></div>
            </div>
        </div>
    </section>

    <section class="col-12 col-sm-6 col-md-3"
        style="float:left; display:inline; width: 50%; margin-left: 2%;margin-top:5%;">
        <form style="margin-top: 5%">
            <table class="mytable" id="car table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Model</th>
                        <th scope="col">Color</th>
                        <th scope="col">Price</th>
                        <th scope="col">Plate Number</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Warehouse Location</th>
                    </tr>
                </thead>
                <tbody id="output">
                </tbody>
            </table><br><br><br>
        </form>
    </section>
</body>

</html>


<script type="text/javascript">
    $(document).ready(function () {
        $("#searchN,#searchM,#searchC,#searchP").keyup(function () {
            $.ajax({
                type: 'POST',
                url: 'search.php',
                data: {
                    name: $("#searchN").val(),
                    model: $("#searchM").val(),
                    color: $("#searchC").val(),
                    price: $("#searchP").val(),
                },
                success: function (data) {
                    $("#output").html(data);
                }
            })
        })
    })
</script>



<script>
    function validateReservationForm() {
        var form = document.forms["reserve"];

        var date = new Date();
        var year = date.toLocaleString("default", { year: "numeric" });
        var month = date.toLocaleString("default", { month: "2-digit" });
        var day = date.toLocaleString("default", { day: "2-digit" });
        var currentDate = year + "-" + month + "-" + day;

        if (form["carplate"].value == '') {
            alert("Car Plate number must be filled out");
            return false;
        }
        if (form["startDate"].value < currentDate) {
            alert("Pickup Time must be after at least one day from now");
            return false;
        }
        if (form["startDate"].value > form["endDate"].value) {
            alert("Return date must be after pickup date");
            return false;
        }
    }


</script>



<?php
include "config.php";
if (isset($_POST['Reserve'])) {
    $pickup_time = $_POST["startDate"];
    $return_time = $_POST["endDate"];
    $plate_no = $_POST['carplate'];
    $cid = '';
    if (isset($_SESSION['cid'])) {
        $cid = $_SESSION['cid'];
    }

    $sql = "SELECT * FROM `reservation` WHERE plate_no = '$plate_no' AND ((`start_date` BETWEEN '$pickup_time' AND  '$return_time') OR (`End_date` BETWEEN '$pickup_time' AND '$return_time')  OR ('$pickup_time' BETWEEN `start_date` AND `End_date`) OR ('$return_time' BETWEEN `start_date` AND `End_date`))";
    $sql2 = "SELECT * FROM `car` WHERE plate_no = '$plate_no' AND `condition` = 'out of service'";
    $sql3 = "SELECT * FROM `car` WHERE plate_no = '$plate_no'";
    $result1 = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    $result3 = mysqli_query($conn, $sql3);
    if ((mysqli_num_rows($result1) == 0) && (mysqli_num_rows($result2) == 0) && (mysqli_num_rows($result3) != 0)) {
        $row = mysqli_fetch_assoc($result3);
        $dateDiff = strtotime($return_time) - strtotime($pickup_time);
        $days = abs($dateDiff / (60 * 60) / 24);
        $total_amount = ($days+1) * $row['price'];
        $query = "INSERT INTO `reservation` (plate_no,`start_date`,`End_date`,is_paid,cid,total_amount) VALUES('$plate_no','$pickup_time','$return_time','N','$cid','$total_amount')";
        $queryy = "UPDATE `car` SET `Status` = 'reserved' WHERE `car`.`plate_no` = '$plate_no'";
        $result = mysqli_query($conn, $query);
        $resultt = mysqli_query($conn, $queryy);
        $sql = "INSERT INTO `status`(`status_date`,`Status`,`condition`,`plate_no`,`pay_status`) VALUES(now(),'reserved','good','$plate_no','not rented')";
        $result = mysqli_query($conn, $sql);
        echo '<samp>Reservation done successfully.</samp>';
    } else {
        echo '<samp>You can\'t reserve this car right now.</samp>';
    }
}
?>