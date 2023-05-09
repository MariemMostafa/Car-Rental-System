<?php
ob_start();
// session_start();
if (isset($_SESSION['msg'])) {
  echo "<h1>*Plate number already exists!</h1>";
  ?>
  <br>
  <div class="alert alert-danger" role="alert">
    *Plate number already exists!
  </div>

  <?php
  unset($_SESSION['msg']);
} else if (isset($_SESSION['msg1'])) {
  echo "<h3>*Please enter a valid warehouse id!</h3>";
  unset($_SESSION['msg1']);
}
?>
<html>

<head>
  <!-- <meta charset="utf-8"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="style.css">
  <!-- <link rel="stylesheet" href="final.css"> -->
  <script>
    function validateAddCar() {
      let name = document.forms["addCar"]["name"].value;
      if (name == "") {
        alert("Car name must be filled out!");
        return false;
      }
      let model = document.forms["addCar"]["model"].value;
      if (model == "") {
        alert("Model must be filled out!");
        return false;
      }
      let plate_no = document.forms["addCar"]["plate_no"].value;
      if (plate_no == "") {
        alert("Plate number must be filled out!");
        return false;
      }
      let warehouse_id = document.forms["addCar"]["warehouse_id"].value;
      if (warehouse_id == "") {
        alert("Warehouse ID must be filled out!");
        return false;
      }
      let color = document.forms["addCar"]["color"].value;
      if (color == "") {
        alert("Color must be filled out!");
        return false;
      }
      let price = document.forms["addCar"]["price"].value;
      if (price == "") {
        alert("Color must be filled out!");
        return false;
      }
    }

    function preventBack() { window.history.forward() };
    setTimeout("preventBack()", 0);
    window.onunload = function () { null; }
  </script>

  <title>
    Add Car
  </title>
  <style>
    img.background {
      position: absolute;
      left: 0px;
      top: 0px;
      z-index: -1;
      width: 100%;
      height: 100%;
      -webkit-filter: blur(5px);
      /* Safari 6.0 - 9.0 */
      filter: blur(5px);
    }
  </style>

</head>

<body>
  <img src="images/car4.jpg" class="background" />

  <ul>
    <li style="margin-top:10px;"><a>
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
    <h1 style="color:white;">Add Car To The System</h1>
  </div>
  <section class="ftco-section" style="margin-top:-5%;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="login-wrap p-0">

            <form name="addCar" method="post" onsubmit="return validateAddCar()" action="AddedCar.php"
              class="signin-form">
              <div class="form-group">
                <input type="text" id="cname" name="cname" placeholder="Name" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="text" id="model" name="model" placeholder="Model" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="text" id="plate_no" name="plate_no" placeholder="Plate Number" class="form-control" required>
              </div>
              <div class="form-group">
                <select name="warehouse_id" id="warehouse_id" class="form-control" required>
                  <option value="">Warehouse ID</option>
                  <?php
                  include "config.php";
                  $sql = "SELECT * FROM warehouse";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['warehouse_id']; ?>" style="color:rgb(4, 4, 4);">
                      <?php echo $row['warehouse_id'] ?>
                    </option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <input type="text" id="color" name="color" placeholder="Color" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" min="0" step="any"
                  id="price" name="price" placeholder="Price" class="form-control" required>
              </div>
              <div class="form-group">
                <input class="form-control btn btn-primary submit px-3" type="submit" value="Add" id="Add" required>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>



</body>

</html>