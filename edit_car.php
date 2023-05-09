<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit CAR STATUS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- css -->
    <link rel="stylesheet" href="style1.css">

    <script type="text/javascript">
        function preventBack() { window.history.forward() };
        setTimeout("preventBack()", 0);
        window.onunload = function () { null; }
    </script>



</head>

<body>
    <ul>
        <li style="margin-top:40%;"><a>
                <?php
                $filepath = 'userr.png';
                echo '<img src="' . $filepath . '">';


                echo "admin";

                ?>
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

    <div class="header">
        <h1>Edit Car Page</h1>
    </div>
    <br><br> <br><br><br>

    <!-- my code -->

    <div class="container" style="margin-left: 20%;">

        <form class="w-25" method="POST" action="edit.php">

            <div class="form-group">

                <label for="platenumber">Car Plate Number:</label>
                <input class="form-control" type="text" name="platenumber" id="platenumber">

            </div>

            <br>

            <div class="form-group">

                <label for="selectStatus">New Car Status:</label>

                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="selectStatus"
                    id="selectStatus">
                    <option disabled selected value >Choose New Car Status</option>
                    <option value="good" name="good" id="good">Good</option>
                    <option value="out of service" name="outOfService" id="outOfService">Out of service</option>
                </select>

            </div>

            <br>
            <button class="btn btn-success" type="submit" id="submitbtnn">Submit</button>
            <script>
                var x = document.getElementById("selectStatus");
                var y = document.getElementById("submitbtnn");
                y.disabled = true;
                x.addEventListener("change", function () {
                    if (x.value == "good" || x.value == "out of service") {
                        y.disabled = false;
                    }
                    else{
                        y.disabled = true;
                    }
                })
            </script>

        </form>
        <br>
        <a href="page_admin.php" class="btn btn-danger">back</a>

    </div>
</body>

</html>