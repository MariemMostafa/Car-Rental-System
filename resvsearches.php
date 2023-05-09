<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
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
</style>

<script type="text/javascript">
    function preventBack() { window.history.forward() };
    setTimeout("preventBack()", 0);
    window.onunload = function () { null; }
</script>



</head>

<body>
    <div class="header">
        <h3>Search By Reservation</h3>
    </div>
    <ul style="margin-top:53px;">
        <li style="margin-top:20px"><a>
                <?php $filepath = 'userr.png';
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
        <form class="form-inline" name="searchbyresv" id="searchbyresv" method="post">
            <input type="text" id="reserve_id" name="reserve_id" placeholder="Enter Reservation ID"
                class="form-control"><br>

            <input type="date" id="start_date" name="start_date" placeholder="Enter Start Date"
                class="form-control"><br>

            <input type="date" id="End_date" name="End_date" placeholder="Enter End Date" class="form-control"><br>

            <input type="text" id="plate_no" name="plate_no" placeholder="Enter Plate Number" class="form-control"><br>

            <input type="text" id="is_paid" name="is_paid" placeholder="Payment Status" class="form-control"><br>

            <input type="date" id="paid_at" name="paid_at" placeholder="Payment Date" class="form-control"><br>
        </form>
    </section>
    <section class="col-12 col-sm-6 col-md-3"
        style="float:left; display:inline; width: 60%; margin-top:35px; margin-left:3%;">
        <form style="margin-top: 5%">
            <table class="mytable">
                <thead>
                    <tr>
                        <th scope="col">Reservation ID</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Plate Number</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Payment Date</th>
                    </tr>
                </thead>
                <tbody id="output">
                </tbody>
            </table><br><br><br>
        </form>
    </section>
    <!--Search with ajax-->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#reserve_id, #start_date, #End_date, #plate_no, #is_paid, #paid_at').on("keyup change", function () {
                $.ajax({
                    type: 'POST',
                    url: 'advancedResvSearch.php',
                    data: {
                        reserve_id: $("#reserve_id").val(),
                        start_date: $("#start_date").val(),
                        End_date: $("#End_date").val(),
                        plate_no: $("#plate_no").val(),
                        is_paid: $("#is_paid").val(),
                        paid_at: $("#paid_at").val(),
                    },
                    success: function (data) {
                        $("#output").html(data);
                    }
                })
            })
        })

    </script>
    </script>

</body>

</html>