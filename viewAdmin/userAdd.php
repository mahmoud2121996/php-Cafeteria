

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add user</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="../assets/css/navbar.css">

</head>

<body>

<header class="top-navbar">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				<img src="../assets/images/logo.png" alt="" />
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
				aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbars-rs-food">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
					<li class="nav-item active"><a class="nav-link" href="userAll.php">Users</a></li>
					<li class="nav-item "><a class="nav-link" href="orders.php">Orders</a></li>
					<li class="nav-item"><a class="nav-link" href="checks.php">Checks</a></li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Naguib</a>
						<div class="dropdown-menu" aria-labelledby="dropdown-a">
							<a class="dropdown-item" href="userAdd.php">Add User</a>
							<a class="dropdown-item" href="productAdd.php">Add Product</a>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>

				</ul>
				&nbsp;
				<img src="../assets/images/users/user.png" width="5%" alt="Admin">

			</div>
		</div>
	</nav>
</header>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form id="addUser-form" class="login100-form validate-form flex-sb flex-w" enctype="multipart/form-data" method="POST" action="validations/registerValidation.php">
					<span class="login100-form-title p-b-32">
						Add user
					</span>
					<span class="txt1 p-b-11">
						name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "name is required">
						<input class="input100" type="text" name="name"  required>
						<span class="focus-input100"></span>
                    </div>
                    <span class="txt1 p-b-11">
						Email
					</span>
					<small class="help-block text-danger emailExists"  style="display:none;">This email is already used.</small>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "email is required">
						<input id="email" class="input100" type="email" name="email" required>
						
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input id="passwd" class="input100" type="password" name="pass" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Password Confirm
					</span>
					<small id="passwdFail" class="help-block text-danger"  style="display:none;">passwords don't match.</small>
					<div  class="wrap-input100 validate-input m-b-12" data-validate = "Password confirmation is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input id="passwdCnf" class="input100" type="password" name="passConfirm" required>
						<span class="focus-input100"></span>
						
					</div>

					<span class="txt1 p-b-11">
						room
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "room is required">
						<input class="input100" type="number" name="room" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						phone
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "phone is required">
						<input class="input100" type="phone" name="phone" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						profile Picture
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "profile picture is required">
						<input class="input100" type="file" name="profile" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="admin">
							<label class="text-danger label-checkbox100" for="ckb1">
								<strong>Admin?</strong> 
							</label>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Add User
						</button>
					</div>
					

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="../assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../assets/js/main.js"></script>
	<script src="../assets/js/admin/addUser.js"></script>

</body>
</html>