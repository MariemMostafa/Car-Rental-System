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
        <h1>Search For A Car</h1>
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
        </li>
        <li><a href="edit_car.php">Edit Car Status</a></li>
        <li><a href="Login.html">Log Out</a></li>
    </ul>

    <!-- my code -->

    <form action="page_admin.html">

        <br><br>
        <div class="row" style="margin-left: 200px; margin-top:0%">
            <div class="col">

                <div class="card" style="width:20rem">
                    <img class="card-img-top" src="images/car6.jpg" alt="">

                    <div class="card-body bg-secondary">
                        <h5 class="card-title text-light">Car Search</h5>

                        <p class="card-text text light"></p>
                        <a href="carSearches.php" class="btn btn-outline-warning">Go</a>
                    </div>
                </div>


            </div>

            <div class="col">

                <div class="card" style="width: 20rem">
                    <img class="card-img-top" src="images/car10.jpg" alt="">

                    <div class="card-body bg-secondary">
                        <h5 class="card-title text-light">Customer Search</h5>

                        <p class="card-text text light"></p>
                        <a href="custSearches.php" class="btn btn-outline-warning">Go</a>
                    </div>
                </div>


            </div>

            <div class="col">

                <div class="card" style="width: 20rem">
                    <img class="card-img-top" style="height: 215px" src="images/car11.jpg" alt="">

                    <div class="card-body bg-secondary">
                        <h5 class="card-title text-light">Reservation Search</h5>

                        <p class="card-text text light"></p>
                        <a href="resvsearches.php" class="btn btn-outline-warning">Go</a>
                    </div>
                </div>
            </div>


        </div>

        </div>

        <br><br>
        <button class="btn btn-danger" type="submit">Go Back</button>

    </form>

    <!-- Bootstrap js -->
    <script src="bootstrap.bundle.min.js"></script>

    <!-- js -->
    <script src="main.js"></script>
</body>

</html>