<!DOCTYPE html>
<html lang="en">

<head>
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
    </style>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="style1.css">


    <!-- can't return back code if logged out -->

    <script type="text/javascript">

        function preventBack() { window.history.forward() };
        setTimeout("preventBack()", 0);
        window.onunload = function () { null; }

    </script>



</head>

<body>
    <div class="header">
        <h3>Search By Car</h3>
    </div>
    <ul style="margin-top:53px;">



        <li style="margin-top:20px"><a>
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
    <section class="col-12 col-sm-6 col-md-3"
        style="float:left; display:inline; width: 20%; margin-left: 15%; margin-top:50px;">
        <h1>Search</h1>
        <form class="form-inline" name="searchbycar" id="searchbycar" method="post">
            <input type="text" id="pno" name="pno" placeholder="Enter a Plate Number" class="form-control"><br>

            <input type="text" id="name" name="name" placeholder="Name of Car" class="form-control"><br>

            <input type="text" id="model" name="model" placeholder="Enter Model of Car" class="form-control"><br>

            <input type="text" id="status" name="status" placeholder="Enter Status" class="form-control"><br>

            <input type="text" id="warehouse" name="warehouse" placeholder="Enter Warehouse ID"
                class="form-control"><br>

            <input type="text" id="color" name="color" placeholder="Enter Color" class="form-control"><br>

            <input type="text" id="price" name="price" placeholder="Enter Price Of Car" class="form-control"><br>
        </form>
    </section>
    <section class="col-12 col-sm-6 col-md-3"
        style="float:left; display:inline; width: 60%; margin-top:35px; margin-left:3%;">
        <form style="margin-top: 5%">
            <table class="mytable" id="car table">
                <thead>
                    <tr>
                        <th scope="col">Car Name</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Plate Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Is paid</th>
                        <th scope="col">Warehouse id</th>
                        <th scope="col">Car Color</th>
                        <th scope="col">Car Price</th>

                    </tr>
                </thead>
                <tbody id="output">
                </tbody>
            </table> <br><br><br>
        </form>
    </section>
    <br>
    <br>
    <!--Search with ajax-->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#pno,#model,#name,#status,#condition,#is_paid,#warehouse,#color,#price').on("keyup change", function () {
                $.ajax({
                    type: 'POST',
                    url: 'advancedCarSearch.php',
                    data: {
                        pno: $("#pno").val(),
                        model: $("#model").val(),
                        name: $("#name").val(),
                        status: $("#status").val(),
                        condition: $("#condition").val(),
                        is_paid: $('#is_paid').val(),
                        warehouse: $("#warehouse").val(),
                        color: $("#color").val(),
                        price: $("#price").val()

                    },
                    success: function (data) {
                        $("#output").html(data);
                    }
                })
            })
        })
        // $(document).ready(function(){
        //     $('#pno,#model').on("keyup change",function(){
        //     alert ("yalahwy");
        // });
    // });
    </script>
    </script>

</body>

</html>