<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>

    <script type="text/javascript">
        function preventBack() { window.history.forward() };
        setTimeout("preventBack()", 0);
        window.onunload = function () { null; }
    </script>


</head>

<body>
    <div class="header" style="z-index: 100;">
        <h1>Car Rental Service</h1>
    </div>
    <ul style="width:13%;">
        <li style="margin-top:30px"><a>
                <?php
                $filepath = 'userr.png';
                echo '<img src="' . $filepath . '">';

                if (isset($_SESSION['name'])) {
                    echo $_SESSION['name'];
                    // unset($_SESSION['name']);
                }

                ?>
            </a></li>
        <li><a href="Home.php">Home</a></li>
        <li><a href="user.php">Car Search</a></li>
        <li><a href="payment.php">Payment</a></li>
        <li><a href="contactUs.html">Contact Us</a></li>
        <li><a href="aboutUs.html">About Us</a></li>
        <li><a href="Login.html">Log Out</a></li>
    </ul>
</body>

</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_system";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$country_id = $_SESSION['country_id'];
$find = mysqli_query($conn, "SELECT * FROM warehouse WHERE country_id = $country_id");
$row = mysqli_fetch_assoc($find);
if ($row) {
    $warehouse_id = $row['warehouse_id'];
}
$sql = "SELECT * FROM car WHERE warehouse_id = '$warehouse_id'";
$result = $conn->query($sql);
// $sql = "SELECT * FROM car";
// $result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    ?>
    <div class="row" style="margin-left: 200px; margin-top:0%">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col">
                <div class="card mb-4 border-0" style="width: 13rem; margin-left: 20px; margin-top:10px; color: white;">
                    <img class="card-img-top" src="images/toyota.jpg" alt="">
                    <div>
                        <!-- <h5 class="card-title text-light">Payment Report</h5> -->

                        <p class="card-text text light"></p>
                        <p
                            style="color:black;font-weight:medium;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;line-height:0.5rem;">
                            <?php
                            echo "Price: $" . $row["price"] . "\r\n";
                            ?>
                        </p>
                        <p
                            style="color:black;font-weight:light;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;line-height:0.5rem;">
                            <?php
                            echo "Car Name:     " . $row["name"] . "\r\n";
                            ?>
                        </p>
                        <p
                            style="color:black;font-weight:lighter;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;line-height:0.5rem;">
                            <?php
                            echo "Car Model:    " . $row["model"] . "\r\n";
                            ?>
                        </p>
                        <p
                            style="color:black;font-weight:large;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;line-height:0.5rem;">
                            <?php
                            echo "Car Color:    " . $row["color"] . "\r\n";
                            ?>
                        </p>
                        <p
                            style="color:black;font-weight:lighter;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;line-height:0.5rem;">
                            <?php
                            echo "Status: " . $row["Status"] . "\r\n";
                            ?>
                        </p>



                        <a href="user.php" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <?php
            }
} else {
    echo "<tr><td>0 Result's Found!</td></tr>";
}

?>