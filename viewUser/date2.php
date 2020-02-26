<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Site Metas -->
    <title>My Orders</title>  
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

</head>
<body>
	<!-- Start header -->
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
                        <li class="nav-item "><a class="nav-link active" href="products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="userAll.php">Users</a></li>
                        <li class="nav-item active"><a class="nav-link" href="orders.php">Orders</a></li>
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
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>My Orders</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
		<!-- Start Contact -->
        <div class="contact-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-title text-center">
                            <h2>Orders</h2>
                            <p>Here you can view and Cancel your orders </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="contactForm" method="post" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <h2>Date From : </h2>
                                        <input type="date" data-format="dd-MM-yyyy" name="dateFrom" class="form-control" >
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <h2>Date To :</h2>
                                        <input type="date" class="form-control" data-format="dd-MM-yyyy" name="dateTo">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>
                                <div class="col-md-2">
                                    <div class="submit-button text-center" style="display: flex;">
                                        <button class="btn btn-common"name="submit" type="submit" style="opacity: 1;margin-top: 15px;margin-left: 40px;">Search</button>
                                        <div id="msgSubmit" style="margin-left: 50px;margin-top: 10px;" class="h3 text-center hidden"></div> 
                                        <div class="clearfix"></div> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <table class="table" width="100%" border="1"  >
                                        <thead>
                                        <tr style="background-color: #d0a772; color: white;font-size:120%" align="center">
                                        <th ><strong>Date</strong></th>
                                        <th><strong>Products</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>price</strong></th>
                                        <th><strong>Action</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $dateFrom = $_POST["dateFrom"];
                                        $dateTo = $_POST["dateTo"];
                                        include("databaseConnection.php");
                                        $conn = $_SESSION["conn"];
                                        $_SESSION["dateFrom"] = $dateFrom;
                                        $_SESSION["dateTo"] = $dateTo;
                                        // $conn = new PDO($dsn , $user, $pass);
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $query = "SELECT * FROM orders WHERE created_at BETWEEN '$dateFrom' AND '$dateTo' OR created_at BETWEEN '$dateTo' AND '$dateFrom'; ";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();

                                        // set the resulting array to associative
                                        //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        while($row =$stmt->Fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr style="font-size:110%"><td align="center"><?php echo $row["created_at"]; ?></td>
                                        <td align="center">
                                        <a style="color:blue;" href="productsImg.php?id=<?php echo $row["id"]; ?>">+</a>
                                        </td>
                                        <td align="center"><?php echo $row["status"]; ?></td>
                                        <td align="center"><?php echo $row["total"]; ?></td>
                                        <?php if ($row["status"] == "processing"){?>
                                            <td align="center">
                                            <a class="trash" href="#" id=<?php echo $row["id"]; ?>>Cancel</a>
                                            </td>
                                        <?php } ?>
                                        </tr>
                                        <?php $count++; } ?>
                                        </tbody>
                                        </table>
                                    </div>                                 
                                </div>
                            </div>            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact -->
	

	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

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
    <script>    
            $('.trash').click(function(){
                var del_id= $(this).attr('id');
                var $ele = $(this).parent().parent();
                $.ajax({
                    url:"cancelOrder.php?id="+ del_id,
                success: function(result){
                        $ele.remove();
                        alert("Deleted Successfully");
                }

                    })
                    })
                
    </script>
</html>
