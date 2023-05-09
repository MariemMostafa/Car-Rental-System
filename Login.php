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
$email = $_POST['email'];
$password = md5($_POST['psw']);



$automaticUpdate = mysqli_query($conn, "SELECT * FROM `reservation` WHERE End_Date < now()");
if ($automaticUpdate) {
  while ($oprow = mysqli_fetch_array($automaticUpdate)) {
    $plateNo = $oprow['plate_no'];
    $update = mysqli_query($conn, "UPDATE car SET Status ='active', is_paid ='N' WHERE plate_no='$plateNo'");
    $delete = mysqli_query($conn, "DELETE FROM `reservation` WHERE plate_no='$plateNo'");
    $insert = mysqli_query($conn, "INSERT INTO `status` VALUES (now(),'active','good','$plateNo','not rented') ");
  }
}

if ($_POST['loginMenu'] == 'Customer') {
  $find = mysqli_query($conn, "SELECT * from customers where email='" . $email . "' and password='" . $password . "'") or die(mysqli_error($conn));
  $result = mysqli_fetch_assoc($find);
  if ($result) {
    session_start();
    $_SESSION['name'] = $result['fname'];
    $_SESSION['cid'] = $result['cid'];
    $_SESSION['country_id'] = $result['country_id'];
    header('Location: Home.php');
    exit;
  } else {
    echo '<script>alert("You entered incorrect password or email")</script>';
    echo "<script type='text/javascript'>
    window.location = '" . $_SERVER['HTTP_REFERER'] . "';
    </script>";
  }
} else if ($_POST['loginMenu'] == 'Admin') {
  $find = mysqli_query($conn, "SELECT * from admin where email='" . $email . "' and password='" . $password . "'") or die(mysqli_error($conn));
  $result = mysqli_fetch_assoc($find);
  if ($result) {
    header('Location: page_admin.php');
  } else {
    echo '<script>alert("You entered incorrect password or email")</script>';
    echo "<script type='text/javascript'>
  window.location = '" . $_SERVER['HTTP_REFERER'] . "';
  </script>";
  }
}

$conn->close();
?>