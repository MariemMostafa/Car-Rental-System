<!DOCTYPE html>
<html>

<head>

	<title> Registeration </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/registeration.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
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
			filter: blur(2px);
		}
	</style>
	<?php
	$user = 'root';
	$pass = '';
	$db = 'car_system';
	$conn = new mysqli('localhost', $user, $pass, $db) or die("error in connection");
	?>

	<script>
		function validateForm() {
			let lname = document.forms["register"]["lname"].value;
			let fname = document.forms["register"]["fname"].value;
			let email = document.forms["register"]["email"].value;
			let pass = document.forms["register"]["pass"].value;
			let conpass = document.forms["register"]["conpass"].value;
			let mailformat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
			if (fname == "") {
				alert("First Name must be filled out");
				return false;
			}
			if (lname == "") {
				alert("Last Name must be filled out");
				return false;
			}
			if (email == "") {
				alert("Email must be filled out");
				return false;
			}
			if (!(email.match(mailformat))) {
				alert("You have entered an invalid email address!");
				return false;
			}
			if (pass == "") {
				alert("Password must be filled out");
				return false;
			}
			if (conpass == "") {
				alert("Confirm password must be filled out");
				return false;
			}
			if (conpass !== pass) {
				alert("Password doesn't match!");
				return false;
			}
		}

	</script>

</head>

<!-- <body> -->

<body>
	<img src="images/potential2.jpeg" class="background" />
	<section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<form name="register" id="formid" onsubmit="return validateForm()" method="post"
							class="signin-form">
							<div class="container" style="color:green">
								<h1
									style="text-align:center;color:white;font-family:font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
									Register</h1>
							</div>
							<div class="form-group">
								<input type="text" name="fname" id="fname" placeholder="First Name"
									class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control">
							</div>
							<div class="form-group">
								<input type="email" name="email" id="email" placeholder="E-mail" class="form-control">
							</div>
							<div class="form-group">
								<input type="password" name="pass" id="pass" placeholder="Password"
									class="form-control">
							</div>
							<div class="form-group">
								<input type="password" name="conpass" id="conpass" placeholder="Confirm Password"
									class="form-control">
							</div>
							<div class="form-group">
								<select name="gender" id="gender" class="form-control">
									<option value="">Select Gender</option>
									<option value="male" style="color:rgb(4, 4, 4);">Male</option>
									<option value="female" style="color:rgb(4, 4, 4);">Female</option>
								</select>
							</div>
							<div class="form-group">
								<select name="country" id="country" class="form-control">
									<option value="">Select Country</option>
									<?php
									include "config.php";
									$sql = "SELECT * FROM country";
									$result = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo $row['country_id']; ?>" style="color:rgb(4, 4, 4);">
											<?php echo $row['country_name'] ?>
										</option>
										<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<input type="text" name="mobileno" id="mobileno" placeholder="Mobile number" required
									class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="Bankno" id="Bankno" placeholder="Bank Number" required
									class="form-control">
							</div>
							<label>Already have an account?
								<a href="Login.html">Login</a>
								<span class="checkmark"></span>
							</label>
							<div class="form-group">
								<input type="submit" id="submit" name="submit" value="Register"
									class="form-control btn btn-primary submit px-3">
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



	<?php
	if (isset($_POST['submit'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$pass = $_POST['pass'];
		$encryptedPass = md5($pass);
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$country = $_POST['country'];
		$mobile = $_POST['mobileno'];
		$bank = $_POST['Bankno'];
		$ecryptedBank = md5($bank);
		$sql1 = "SELECT * FROM customers WHERE email = '{$email}'";
		$result = $conn->query($sql1);
		if ($result->num_rows == 0) {
			$sql = "INSERT INTO customers (fname, lname, email, `password`, gender, country_id, mobile_no, bank_no) 
        			VALUES ('{$fname}', '{$lname}' , '{$email}', '{$encryptedPass}', '{$gender}', '{$country}', '{$mobile}', '{$ecryptedBank}')";
			if ($conn->query($sql) === TRUE) {
				echo '<script>alert("User added")</script>';
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
		} else {

			echo '<script>alert("User Already Exists")</script>';

		}
	}
	?>

</body>

</html>