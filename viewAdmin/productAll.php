<?php
session_start();
include_once "validations/middleware.php";
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>Available Products</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">
	<!-- Responsive CSS -->
	<!-- <link rel="stylesheet" href="../assets/css/responsive.css"> -->
	<!-- Custom CSS -->
	<link rel="stylesheet" href="../assets/css/custom.css">
	<link rel="stylesheet" href="../assets/css/table.css">

	
</head>

<body>
	<!-- Start header -->
		<?php include_once "navBar/navBar.php"  ?> 
	<!-- End header -->

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Available Products</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start blog -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Available Products</h2>
						<p>View All Products we offer</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- <div> -->
					<table class="products table table-striped text-center"  border="3px">
						<thead>
							<tr>
								<th>id</th>
								<th>product name</th>
								<th>price</th>
								<th>category id</th>
								<th>image</th>
								<th>action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							try {
								// $db = new PDO($dbn, $dbUser, $dbPassword);
								include_once "databaseQueries/connection.php";
								$selectQuery = "select products.id,products.product_name,products.price,category_product.category_name,products.image from products,category_product where products.category_id=category_product.id";
								$results = $conn->query($selectQuery);
								while ($row = $results->fetch()) {
									echo "<tr>
											<td>" . $row["id"] . "</td>
											<td>" . $row["product_name"] . "</td>
											<td>" . $row["price"] . "</td>
											<td>" . $row["category_name"] . "</td>
											<td> <img src='" . $row["image"] . "' width='75px' height='50px'></td>
											<td><a class='btn rounded p-1 btn-danger' href='deleteProducts.php?id=" . $row["id"] . "' >delete</a> 
											<a class='btn rounded p-1 btn-primary' href='updateProducts2.php?id=" . $row["id"] . "' >update</a>
											</td>
											
										</tr>";
								}
							} catch (\Throwable $th) {
								//throw $th;

							}

							?>
						</tbody>

					</table>
				<!-- </div> -->
			</div>
		</div>
	</div>



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
   
    <script src="../assets/js/TemplateJS/form-validator.min.js"></script>
    <!-- <script src="../assets/js/TemplateJS/contact-form-script.js"></script> -->
    
    <!--===============================================================================================-->
    <script src="../assets/js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>

</html>