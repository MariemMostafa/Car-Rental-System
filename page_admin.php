<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- css -->
    <link rel="stylesheet" href="style.css">

    <script type="text/javascript">
        function preventBack() { window.history.forward() };
        setTimeout("preventBack()", 0);
        window.onunload = function () { null; }
    </script>




</head>

<body>
    <div class="header">
        <h1>Admin Page</h1>
    </div>
    <ul style="width:15%;">

        <li style="margin-top:20px"><a><?php
        $filepath = 'userr.png';
        echo '<img src="' . $filepath . '">';


        echo "admin";

        ?></a></li>
        <li><a href="page_admin.php">Home</a></li>

        <li><a href="AddCar.php">Add Car</a></li>
        <li><a href="searchTypes.php">Car Search</a>
        <li>
        <li class="nestedList"><a href="carSearches.php">Search By Car</a></li>
        <li class="nestedList"><a href="custSearches.php">Search By Customer</a></li>
        <li class="nestedList"><a href="resvsearches.php">Search By Reservation</a></li>
        </li>
        <li><a href="edit_car.php">Edit Car Status</a></li>
        </li>
        <li><a href="Login.html">Log Out</a></li>
    </ul>

    <!-- my code -->

    <form action="carReport.php" method="POST">
        <br><br>
        <div class="row" style="margin-left: 200px; margin-top:0%">
            <div class="col">

                <div class="card" style="width: 15rem">
                    <img class="card-img-top" src="images/add_car.png" alt="">

                    <div class="card-body bg-secondary">
                        <h5 class="card-title text-light">Add Car</h5>

                        <p class="card-text text light"></p>

                        <a href="AddCar.php" class="btn btn-outline-warning">Go</a>
                    </div>
                </div>


            </div>

            <div class="col">

                <div class="card" style="width: 15rem">
                    <img class="card-img-top" src="images/advanced_search.png" alt="">

                    <div class="card-body bg-secondary">
                        <h5 class="card-title text-light">Advanced Search</h5>

                        <p class="card-text text light"></p>
                        <a href="searchTypes.php" class="btn btn-outline-warning">Go</a>
                    </div>
                </div>


            </div>

            <div class="col">

                <div class="card" style="width: 15rem">
                    <img class="card-img-top" src="images/car _edit.jpg" alt="">

                    <div class="card-body bg-secondary">
                        <h5 class="card-title text-light">Car Edit</h5>

                        <p class="card-text text light"></p>
                        <a href="edit_car.php" class="btn btn-outline-warning">Go</a>
                    </div>
                </div>


            </div>

            <!-- <form action="carReport.php" method="POST">  -->
            <div class="col">

                <div class="card" style="width: 15rem">
                    <img class="card-img-top" src="images/car_reports.png" alt="">

                    <div class="card-body bg-secondary">
                        <h5 class="card-title text-light">Car Reports</h5>

                        <p class="card-text text light"></p>
                        <label for="start_date">
                            <input type="date" id="start_date" name="start_date" style="display: none;">
                        </label>
                        <label for="end_date">
                            <input type="date" id="end_date" name="end_date" style="display:none;">

                        </label>
                        <label for="custid">
                            <input type="number" id="custid" name="custid" placeholder="Enter Customer ID"
                                style="display:none;">
                        </label>
                        <label for="report">
                            <select id="report" name="report">
                                <option disabled selected value> -- select an option -- </option>
                                <option value="payment">Payment</option>
                                <option value="status">Status of all cars</option>
                                <option value="reservation1" id="report1">Cars and Customers</option>
                                <option value="reservation2" id="report2">Reservation of car</option>
                                <option value="reservation3" id="report3">Reservation of customer</option>
                            </select>
                        </label>

                        <!-- <a href="carReport.php" class="btn btn-outline-warning">Go</a> -->
                        <button class="btn btn-outline-warning" type="submit" style="display:none;"
                            id="submitbtn">Go</button>
                    </div>
                    <script type="text/javascript">
                        // var y=document.getElementById("custid");
                        //display submitbtn only if user selected options from dropdown
                        var y = document.getElementById("submitbtn");
                        var x = document.getElementById("report");
                        x.addEventListener("change", function () {
                            if (x.value == "reservation1" || "status" || "reservation2" || "reservation3" || "payment") {
                                document.getElementById("submitbtn").style.display = "block";

                            }
                            else {
                                document.getElementById("submitbtn").style.display = "none";
                            }
                        })
                        x.addEventListener("change", function () {
                            if (x.value == "reservation3") {
                                document.getElementById("start_date").style.display = "none";
                                document.getElementById("end_date").style.display = "none";
                                document.getElementById("custid").style.display = "block"
                            }
                            else if (x.value == "status") {
                                document.getElementById("start_date").style.display = "block";
                                document.getElementById("end_date").style.display = "none";
                                document.getElementById("custid").style.display = "none"
                            }
                            else {
                                document.getElementById("start_date").style.display = "block";
                                document.getElementById("end_date").style.display = "block";
                                document.getElementById("custid").style.display = "none"
                            }
                        })
                    </script>
                </div>


            </div>



        </div>

        <br><br>
        <!-- <button class="btn btn-danger" type="submit">LogOut</button> -->

    </form>




    <!-- Bootstrap js -->
    <script src="bootstrap.bundle.min.js"></script>

    <!-- js -->
    <script src="main.js"></script>
</body>

</html>