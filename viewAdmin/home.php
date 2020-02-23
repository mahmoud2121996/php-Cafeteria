<?php
session_start();

 include_once "databaseQueries/selectCustomers.php";
 include_once "databaseQueries/selectProducts.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Metas -->
    <title>Home</title>
    <!-- Site Icons -->
    <link rel="shortcut icon" href="../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/css/homePageAdmin.css">
</head>


<body>
    <!-- Start header -->
    <header class="top-navbar" style="z-index: 1000000;">
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
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item "><a class="nav-link active" href="products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="userAll.php">Users</a></li>
                        <li class="nav-item "><a class="nav-link" href="orders.php">Orders</a></li>
                        <li class="nav-item"><a class="nav-link" href="checks.php">Checks</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a"
                                data-toggle="dropdown">Naguib</a>
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
                    <h1>Home</h1>

                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Contact -->
    <div class="contact-box">
        <div class="col-12 p-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center" style="z-index: 10000;">
                        <h2>Choose Customer</h2>
                        <form id="app-cover">
                            <div id="select-box">
                                <input type="checkbox" id="options-view-button">
                                <div id="select-button" class="brd">
                                    <div id="selected-value">
                                        <span id="selected-customer">Select a Customer</span>
                                    </div>
                                    <div id="chevrons">
                                        <i class="fas fa-chevron-up"></i>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div id="options">
                                <?php foreach($customersAll as $customer): ?>
                                    <div class="option">
                                        <input class="s-c top" type="radio" name="customer" value="<?php echo $customer[0] ?>">
                                        <input class="s-c bottom" type="radio" name="customer" value="<?php echo $customer[0] ?>">
                                        <span class="label"><?php echo $customer[1] ?></span>
                                        <span class="opt-val"><?php echo $customer[1] ?></span>
                                    </div>
                                <?php endforeach; ?>
                                    <div id="option-bg"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 shadow-lg p-3 mb-5 bg-white rounded text-center h-50 .overflow-auto">
                            <h1> Order List</h1>
                            <div id="order-Wrapper-admin">
                                <form action="validations/createOrderValidation.php" method="POST" >
                                <table id="productsTable" class="w-100 table table-striped table-condensed .thead-dark">
                                    <tbody>

                                    </tbody>
                                    
                                </table>
                                <input id="customerSelected" type="text" name="customerSelected" hidden value="">
                                <input id="products" type="text" name="products" hidden value="" >
                                <input id="totalSentToBackend" type="text" name="total" hidden value="">
                                <textarea name="notes" id="" cols="3" class="col-12" placeholder="Any special Requests?"></textarea><br>
                                    <input id="submit-btn" class="btn-lg shadow-lg" type="submit" value="Order!" style="background-color:#d0a772;">
                                </form>
                                <h1 class="m-5">Total : <strong id="total"> 0.00 </strong> EGP</h1>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <h1 style="font-size: 34px;">Available Products</h1>
                            <div id="containerFlex">
                            <?php foreach($productsAll as $product): ?>
                                    <div id="<?php echo $product[1] ?>" class="card" >
                                        <h4><b><?php echo $product[1] ?></b></h4>
                                        <span hidden><?php echo $product[0] ?></span>
                                        <div class="containerCard">
                                            <!-- sdszd -->
                                            <img src="<?php echo $product[4] ?>" />
                                        </div>
                                        <div class="footer">
                                            <strong><span><?php echo $product[2] ?></span> EGP</strong>
                                        </div>
                                    </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->




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
    <script src="../assets/js/TemplateJS/contact-form-script.js"></script>

    <!--===============================================================================================-->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/admin/homePageAdmin.js"></script>

    <script>
    // define the 2 values that will be sent to back end; 

    </script>

</html>