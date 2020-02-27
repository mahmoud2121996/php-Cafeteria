
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Forget Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="assets/css/navbar.css">

</head>

<body>
<?php

$passworderror = "";
$servername = "localhost";
$username = "root";
$password = "";


if(isset($_POST['update']))
{
	if ($_POST["pass"] !== $_POST["passConfirm"]) {
		$passworderror = "password not match";
		" <br/>";
	}
	else{
		$pass=$_POST["pass"];
        $email=$_POST["username"];
	try {
		$db_config = parse_ini_file('config.sample.ini');
		$conn = new PDO("mysql:dbname={$db_config['db_name']};".
								"host={$db_config['db_host']};".
								"port={$db_config['db_port']};",
								$db_config['db_user'],
								$db_config['db_pass']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        $query = "UPDATE users SET password= '$pass'  where email='$email' ;";
      
        $pdoResult = $conn->prepare($query);
        
        $pdoExec = $pdoResult->execute();
       header("location:login.php");
	} catch (PDOException $e) {
		echo "Connectionupdatefailed: " . $e->getMessage();
	}
	
}
}



?>
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="assets/images/logo.png" alt="" />
				</a>
			</div>
		</nav>
	</header>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form  method="post" enctype="multipart/form-data" action="forgotPassword.php" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-32">
						Forget Password
					</span>

					<span class="txt1 p-b-11">
						Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
						<input class="input100" type="text" name="name">
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
						<input class="input100" type="email" name="username">
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						New Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						confirm Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="passConfirm">
						<span class="focus-input100"></span>
					</div>
					<span class="passworderror" style="color:red;display:inline;"><?php echo $passworderror; ?></span>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="update">
							Update Password
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
    </form>

	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

</body>

</html>
