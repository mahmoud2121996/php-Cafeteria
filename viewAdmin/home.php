<?php
session_start();


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
    <title>Home</title>
    <!-- Site Icons -->
    <link rel="shortcut icon" href="../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Responsive CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/responsive.css"> -->
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
        <div class="col-12">
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
                                    <div class="option">
                                        <input class="s-c top" type="radio" name="customer" value="1">
                                        <input class="s-c bottom" type="radio" name="customer" value="1">
                                        <span class="label">Omar</span>
                                        <span class="opt-val">Omar</span>
                                    </div>
                                    <div class="option">
                                        <input class="s-c top" type="radio" name="customer" value="Dalia" >
                                        <input class="s-c bottom" type="radio" name="customer" value="Dalia">
                                        <span class="label">Dalia</span>
                                        <span class="opt-val">Dalia</span>
                                    </div>
                                    <div class="option">
                                        <input class="s-c top" type="radio" name="customer" value="Nahla">
                                        <input class="s-c bottom" type="radio" name="customer" value="Nahla">
                                        <span class="label">Nahla</span>
                                        <span class="opt-val">Nahla</span>
                                    </div>
                                    <div class="option">
                                        <input class="s-c top" type="radio" name="customer" value="Mahmoud">
                                        <input class="s-c bottom" type="radio" name="customer" value="Mahmoud">
                                        <span class="label">Mahmoud</span>
                                        <span class="opt-val">Mahmoud</span>
                                    </div>

                                    <div id="option-bg"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <br>
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
                                <input id="products" type="text" name="products" hidden value="">
                                <input id="totalSentToBackend" type="text" name="total" hidden value="">
                                <textarea name="notes" id="" cols="3" class="col-12"></textarea><br>
                                    <input id="submit-btn" class="btn-lg shadow-lg" type="submit" value="Order!" style="background-color:#d0a772;">
                                </form>
                                <h1 class="m-5">Total : <strong id="total"> 0.00 </strong> EGP</h1>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <h1 style="font-size: 34px;">Available Products</h1>
                            <div id="containerFlex">
                                <div id="Nescafe" class="card" >
                                    <h4><b>Nescafe</b></h4>
                                    <span hidden>1</span>
                                    <div class="containerCard">
                                        <!-- sdszd -->
                                        <img src="../assets/images/products/Nescafe.png" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>8.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div id="Tea" class="card">
                                    <span hidden>2</span>
                                    <h4><b>Tea</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/tea.jpg" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>5.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div id="Coffee" class="card">
                                    <span hidden>3</span>
                                    <h4><b>Coffee</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/coffee.jpg" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>6.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div id="Water" class="card">
                                    <span hidden>4</span>
                                    <h4><b>Water</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/water.jpg" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>4.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div id="Orange" class="card">
                                    <span hidden>5</span>
                                    <h4><b>Orange Juice</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/orangeJuice.jfif" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>10.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div class="card">
                                    <span hidden>6</span>
                                    <h4><b>watermelon Juice</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/watermelon.jpg" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>10.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div class="card">
                                    <span hidden>7</span>
                                    <h4><b>Beans Sandwich</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/beans.webp" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>3.50</span> EGP</strong>
                                    </div>
                                </div>
                                <div class="card">
                                    <h4><b>Choclate Pate</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/chocolatePate.jpg" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>12.50</span> EGP</strong>
                                    </div>
                                </div>
                                <div class="card">
                                    <h4><b>Tea</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/tea.jpg" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>5.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div class="card">
                                    <h4><b>Coffee</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/coffee.jpg" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>6.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div class="card">
                                    <span hidden>8</span>
                                    <h4><b>Water</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/water.jpg" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>4.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div class="card">
                                    <span hidden>9</span>
                                    <h4><b>Orange Juice</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/orangeJuice.jfif" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>10.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div class="card">
                                    <span hidden>10</span>
                                    <h4><b>watermelon Juice</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/watermelon.jpg" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>10.00</span> EGP</strong>
                                    </div>
                                </div>
                                <div class="card">
                                    <span hidden>11</span>
                                    <h4><b>Beans Sandwich</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/beans.webp" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>3.50</span> EGP</strong>
                                    </div>
                                </div>
                                <div class="card">
                                    <span hidden>12</span>
                                    <h4><b>Choclate Pate</b></h4>
                                    <div class="containerCard">
                                        <img src="../assets/images/products/chocolatePate.jpg" alt="Avatar" />
                                    </div>
                                    <div class="footer">
                                        <strong><span>12.50</span> EGP</strong>
                                    </div>
                                </div>
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