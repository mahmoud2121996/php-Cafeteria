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
    <title>Orders</title>  
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
					<h1>Orders</h1>
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
                            <p>Here you can view Current orders </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php                                        
                                        include_once "databaseQueries/connection.php";                                       
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $query = "SELECT * FROM orders WHERE `status` = 'processing'; ";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();
                                        $num = $stmt->rowCount();                                        
                                        // echo $num;                                        
                                        while($row =$stmt->Fetch(PDO::FETCH_ASSOC)) { ?>
                                            <table class="table" width="100%" border="1" style="margin: 0%;" >
                                            <thead>
                                            <tr style="background-color: #d0a772; color: white;font-size:120%" align="center">
                                            <th ><strong>Date</strong></th>
                                            <th><strong>Name</strong></th>
                                            <th><strong>Room</strong></th>
                                            <th><strong>Ext.</strong></th>
                                            <th><strong>Action</strong></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            <tr style="font-size:110%;">
                                                <td align="center"><?php echo $row["created_at"]; ?></td>
                                                <?php 
                                                    
                                                    $cid = $row["customer_id"];                                                
                                                    $query1 = "SELECT * FROM users WHERE `id` = '$cid'; ";                                            
                                                    $stmt1 = $conn->prepare($query1);
                                                    $stmt1->execute();
                                                    while($row1 =$stmt1->Fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <td align="center"><?php echo $row1["name"]; ?></td>
                                                        <td align="center"><?php echo $row1["room_No"]; ?></td>
                                                        <td align="center"><?php echo $row1["Ext"]; ?></td>
                                                        <td align="center">
                                                        <a class="deliver" href="#" id=<?php echo $row["id"]; ?>>Deliver</a>
                                                        </td>
                                                <?php } ?>
                                            </tr>

                                            <tr>
                                                <table class="table" width="100%" style="border-style: solid;border-width: 1px;">
                                                <tbody>
                                                <tr style="display:flex;justify-content:space-evenly;margin-top:30px;">
                                                    <?php
                                                        $orderId = $row["id"]; 
                                                        $query2 = "SELECT * FROM order_product WHERE order_id = $orderId;";
                                                        $stmt2 = $conn->prepare($query2);
                                                        $stmt2->execute();
                                                        $num = $stmt2->rowCount();
                                                        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                                            //for ($i = 0; $i < $num; $i++) {
                                                                $pro = $row2["product_id"];
                                                                $query3 = "SELECT * FROM products WHERE id = '$pro'";
                                                                $stmt3 = $conn->prepare($query3);
                                                                $stmt3->execute();
                                                                $row3 = $stmt3->fetch();
                                                                $amount = $row2["number"];
                                                                $name = $row3["product_name"];
                                                                $price = $row3["price"];
                                                                $img = $row3["image"];
                                                                ?>
                                                                <td align="center">
                                                                    <img src=../assets/images/products/<?php echo $img; ?> height='100px' width='100px'>
                                                                    <p><strong> Product : </strong> <?php echo $name;?>     <strong>Price : </strong><?php echo $price;?> L.E</p>
                                                                    <p><strong>Amount : </strong><?php echo $amount;?>    <strong>Total : </strong><?php echo $row2["total_price"]?> L.E </p>
                                                                    <p>  </p>
                                                                </td>
                                                                <?php
                                                            //}
                                                        }
                                                    ?>
                                                </tr>
                                                </tbody>    
                                                </table>    
                                            </tr>
                                        <?php $count++; } ?>
                                        </tbody>
                                        </table>
                                    </div>                                 
                                </div>
                            </div>
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
            $('.deliver').click(function(){
                var del_id= $(this).attr('id');
                var $ele = $(this).parent().parent();
                // alert(del_id);
                $.ajax({
                    url:"deliverOrder.php?id="+ del_id,
                success: function(result){
                        $ele.remove();
                        alert("Order out for delivery");
                }

                    })
                    })
                
    </script>
</html>
