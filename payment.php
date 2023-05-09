<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>payment page</title>
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="bootstrap.min.css">
  <!-- css -->
  <link rel="stylesheet" href="style.css">

  <style>
    table.mytable {
      font-family: arial, sans-serif;
      border-collapse: separate;
      width: 100%;
      border-top: transparent;
      border-bottom: transparent;
      border-left: transparent;
      border-right: transparent;
      border-radius: 15px;
      */
    }

    table.mytable>thead>tr>th {
      font-family: arial, sans-serif;
      color: white;
      font-weight: bold;
      font-size: large;
      border: transparent;
      background-color: darkgrey;
      border-radius: 5px;
    }

    table.mytable>tbody>tr>td {
      color: white;
      border: transparent;
      background-color: #282A35;
      border-radius: 5px;
      text-align: center;
    }
  </style>
  <script type="text/javascript">

    function preventBack() { window.history.forward() };
    setTimeout("preventBack()", 0);
    window.onunload = function () { null; }

  </script>
</head>

<body class="background"
  style="background-image: url(images/payment2.jpg);background-size:cover;background-repeat:repeat;">

  <form name="pay" id="pay" method="post">
    <section>

      <div class="container py-13">

        <section class="col-12 col-sm-6 col-md-3"
          style="float:right; display:inline; width: 50%; margin-left: -25%;margin-top:10%;">
          <form style="margin-top: 5%">
            <table class="mytable" id="car table">
              <thead>
                <tr>
                  <th scope="col" style="color:white;">Reservation ID</th>
                  <th scope="col" style="color:white;">Start Date</th>
                  <th scope="col" style="color:white;">Return Date</th>
                  <th scope="col" style="color:white;">Plate Number</th>
                  <th scope="col" style="color:white;">Total Amount</th>
                </tr>
              </thead>
              <tbody id="output">
              </tbody>

          </form>
          <?php
          session_start();
          include "config.php";

          $cid = '';
          if (isset($_SESSION['cid'])) {
            $cid = $_SESSION['cid'];
          }

          $sql = "SELECT * FROM `reservation` WHERE cid='$cid' AND NOT is_paid='Y' AND now() < End_date order by (reserve_id) ";


          $result1 = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result1) != 0) {

            while ($row = mysqli_fetch_assoc($result1)) {

              echo "	<tr>
                <td>" . $row['reserve_id'] . "</td>
                <td>" . $row['start_date'] . "</td>
                <td>" . $row['End_date'] . "</td>
                <td>" . $row['plate_no'] . "</td>
                <td>" . $row['total_amount'] . "</td>
              </tr>";
            }
          } else {
            echo "<tr><td>No payments due!</td></tr>";
          }
          ?>
          </table><br><br><br>
        </section>
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 col-lg-6 col-l-4">
            <div class="card rounded-3">
              <div class="card-body mx-1 my-2">
                <div class="d-flex align-items-center">
                  <div>
                    <a><?php
                    $filepath = 'images/visa.png';
                    echo '<img src="' . $filepath . '">';


                    ?></a>
                  </div>
                  <div>
                    <p class="d-flex flex-column mb-0">
                    </p>
                  </div>
                </div>
                <label for="rid">Enter your reservation ID:</label>
                <input class="form-control" type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                  min="0" name="rid" id="rid" placeholder="Reservation ID " required><br><br>


                <div class="d-flex justify-content-between align-items-center pb-1">
                  <a href="user.php" class="text-muted">Go back</a>
                  <button type="submit" class="btn btn-primary btn-lg" id="pay" name="pay">Pay amount</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </section> -->
      <!-- </form> -->

      <?php



      if (isset($_POST['pay'])) {
        include "config.php";
        $rid = $_POST["rid"];
        $flage = 0;


        $sql = "SELECT * FROM `reservation` WHERE cid='$cid' AND NOT is_paid='Y' AND now() < End_date order by (reserve_id) ";
        $result1 = mysqli_query($conn, $sql);


        while ($row = mysqli_fetch_assoc($result1)) {
          if ($row['reserve_id'] == $rid) {


            $currentDate = date("Y-m-d");
            $mysql = "UPDATE reservation SET is_paid = 'Y' , paid_at ='$currentDate' WHERE reservation.reserve_id='$rid'";
            $pay = mysqli_query($conn, $mysql);
            $mysql2 = "SELECT * FROM reservation WHERE reserve_id='$rid' ";
            $pay2 = mysqli_query($conn, $mysql2);
            $row = mysqli_fetch_assoc($pay2);
            $plate_no = $row['plate_no'];
            $mysql3 = "INSERT INTO `status`(`status_date`,`Status`,`condition`,`plate_no`,`pay_status`) VALUES(now(),'reserved','good','$plate_no','rented')";
            $pay3 = mysqli_query($conn, $mysql3);
            $mysql4 = "UPDATE car SET is_paid = 'Y' WHERE car.plate_no='$plate_no'";
            $pay4 = mysqli_query($conn, $mysql4);
            $flage = 1;
          }
        }
        if ($flage == 0) {

          echo '<script>alert("please enter a valid reservation ID")</script>';

        } elseif ($flage == 1) {
          echo '<h1 style="color:white;font-size:large;">Payment done successfully</h1>';
        }
      }

      ?>
      </section>
      </form>
</body>

</html>