<?php
session_start();
// include_once "validations/middleware.php";

?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Site Metas -->
    <title>Add Products</title>  
    <!-- Site Icons -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">    
    <!-- Checks CSS -->
    <link rel="stylesheet" href="../assets/css/checks.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
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
					<h1>Checks</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
		<!-- Start Contact -->
    <div class="contact-box">
        <div id="tabs" class="project-tab" style="margin-top: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav
              -home-tab">
                                <?php ?>
                                <!-- inputs -->
                               
                               
                                <form class="text-center m-3" action="checks.php" method="POST">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h2>Date From : </h2>
                                            <input type="date" data-format="yyyy-MM-dd" name="dateFrom" class="form-control" >
                                            <div class="help-block with-errors"></div>
                                        </div>                                 
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h2>Date To :</h2>
                                            <input type="date" class="form-control" data-format="yyyy-MM-dd" name="dateTo">
                                            <div class="help-block with-errors"></div>
                                        </div>                                 
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h2>&nbsp;</h2>
                                            <input class="btn btn-common" type="submit"  name="selectDate" value="filter by date">
                                        </div>                                 
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                        <label for="users">users : </label>
                                        
                                                <select name="users" class="browser-default custom-select" id="">
                                         
                                    
                                        <?php
                                        $selectQuery = "select * from users";
                                        // $dbn = "mysql:dbname=cafeteria_php;host=127.0.0.1;port=3306;";
                                        // $dbUser = "root";
                                        // $dbPassword = "";
                                        include_once "databaseQueries/connection.php";
                                        $divCount = 0;
                                        try {
                                            // $db = new PDO($dbn, $dbUser, $dbPassword);
                                            $results = $conn->query($selectQuery);
                                            echo "<option value='all'>all users</option>";

                                            while ($row = $results->fetch()) {
                                                echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                                            }
                                        } catch (\Throwable $th) {
                                            //throw $th;
                                        }
                                        ?>
                                    </select>
                                        </div>                                 
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <h2>&nbsp;</h2>
                                            <input class="btn btn-common" type="submit" name="selectUser" value="filter by user">
                                        </div>                                 
                                    </div>
                                </div>

                                
                                   
                                </form>
                                <!-- checks -->
                                <section class="container">
                                    <table class="table text-center" border="5" class = "table">
                                        <thead>
                                            <tr>
                                                <td>name</td>
                                                <td>amount</td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (isset($_POST["selectUser"])) {
                                                echo "by user";
                                                try {
                                                    $selectQuery = "SELECT users.name , orders.customer_id , SUM(total) as amount FROM orders JOIN users on users.id = orders.customer_id  GROUP by orders.customer_id;";
                                                    if (isset($_POST["users"]) && !empty($_POST["users"])) {
                                                        if ($_POST["users"] == "all") {
                                                            $selectQuery = "SELECT users.name , orders.customer_id , SUM(total) as amount FROM orders JOIN users on users.id = orders.customer_id  GROUP by orders.customer_id;";
                                                        } else {
                                                            $selectQuery = "SELECT users.name , orders.customer_id , SUM(total) as amount FROM orders JOIN users on users.id = orders.customer_id where users.name='" . $_POST["users"] . "' GROUP by orders.customer_id";
                                                        }
                                                    }
                                                    // $db = new PDO($dbn, $dbUser, $dbPassword);
                                                    include_once "databaseQueries/connection.php";
                                                    $results = $conn->query($selectQuery);

                                                    while ($row = $results->fetch()) {
                                                        echo "
                                                            <tr>
                                                                <td> 
                                                                    <div class'ac'>
                                                                        <input class='ac-input' id='ac-" . ++$divCount . "' name='ac-" . $divCount . "' type='checkbox' />
                                                                        <label class='ac-label' for='ac-" . $divCount . "'>" . $row["name"] . "</label>
                                                                        <article class='ac-text'>
                                                                            <table border = '5' class = 'table'>
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>order date</td>
                                                                                        <td>amount</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    ";
                                                        $ordersSelectQuery = "SELECT * from orders where orders.customer_id = " . $row["customer_id"];
                                                        $ordersResults = $conn->query($ordersSelectQuery);
                                                        while ($order = $ordersResults->fetch()) {
                                                            echo "<tr>
                                                                                        <td>
                                                                                            <div class='ac-sub'>
                                                                                            <input class='ac-input' id='ac-" . ++$divCount . "' name='ac-" . $divCount . "' type='checkbox' />
                                                                                            <label class='ac-label' for='ac-" . $divCount . "'>" . $order["created_at"] . "</label>
                                                                                            <article class='ac-sub-text'>";
                                                            $singleOrderQuery = "SELECT products.image ,order_product.number,order_product.order_id,order_product.product_id from order_product JOIN products on products.id = order_product.product_id WHERE order_product.order_id=" . $order["id"];
                                                            // echo "order id is  : ".$order["id"];
                                                            $singleOrderResults = $conn->query($singleOrderQuery);
                                                            while ($singleOrder = $singleOrderResults->fetch()) {
                                                                echo "<br><img src = '" . $singleOrder["image"] . "' width='50px' height= '50px' style= 'margin : 10px'>" . $singleOrder["number"];
                                                            }

                                                            echo "</article>
                                                                                            <div>
                                                                                        </td>
                                                                                            <td>" . $order["total"] . "</td>
                                                                                        </tr>";
                                                        }
                                                        echo "
                                                                                </tbody>
                                                                            </table>
                                                                        </article>
                                                                    </div>
                                                                </td>
                                                                <td>" . $row["amount"] . "</td>
                                                            </tr>
                                                        ";
                                                    }
                                                } catch (\Throwable $th) {
                                                    //throw $th;
                                                }
                                            } else if (isset($_POST["selectDate"])) {
                                                echo "by date";
                                                try {
                                                    $selectQuery = "SELECT users.name , orders.customer_id , SUM(total) as amount FROM orders JOIN users on users.id = orders.customer_id  GROUP by orders.customer_id;";
                                                    if (isset($_POST["dateTo"]) && !empty($_POST["dateTo"]) && isset($_POST["dateFrom"]) && !empty($_POST["dateFrom"]) ) {
                                                        $selectQuery = "SELECT users.name , orders.customer_id , SUM(total) as amount FROM orders JOIN users on users.id = orders.customer_id WHERE created_at BETWEEN '".$_POST['dateFrom']."' and '".$_POST['dateTo']."' GROUP by orders.customer_id";    
                                                    }
                                                    // $db = new PDO($dbn, $dbUser, $dbPassword);
                                                    include_once "databaseQueries/connection.php";
                                                    $results = $conn->query($selectQuery);

                                                    while ($row = $results->fetch()) {
                                                        echo "
                                                            <tr>
                                                                <td> 
                                                                    <div class'ac'>
                                                                        <input class='ac-input' id='ac-" . ++$divCount . "' name='ac-" . $divCount . "' type='checkbox' />
                                                                        <label class='ac-label' for='ac-" . $divCount . "'>" . $row["name"] . "</label>
                                                                        <article class='ac-text'>
                                                                            <table border = '5' class = 'table'>
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>order date</td>
                                                                                        <td>amount</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    ";
                                                        $ordersSelectQuery = "SELECT * from orders where orders.customer_id = " . $row["customer_id"];
                                                        $ordersResults = $conn->query($ordersSelectQuery);
                                                        while ($order = $ordersResults->fetch()) {
                                                            echo "<tr>
                                                                                        <td>
                                                                                            <div class='ac-sub'>
                                                                                            <input class='ac-input' id='ac-" . ++$divCount . "' name='ac-" . $divCount . "' type='checkbox' />
                                                                                            <label class='ac-label' for='ac-" . $divCount . "'>" . $order["created_at"] . "</label>
                                                                                            <article class='ac-sub-text'>";
                                                            $singleOrderQuery = "SELECT products.image ,order_product.number,order_product.order_id,order_product.product_id from order_product JOIN products on products.id = order_product.product_id WHERE order_product.order_id=" . $order["id"];
                                                            // echo "order id is  : ".$order["id"];
                                                            $singleOrderResults = $conn->query($singleOrderQuery);
                                                            while ($singleOrder = $singleOrderResults->fetch()) {
                                                                echo "<br><img src = '" . $singleOrder["image"] . "' width='50px' height= '50px' style= 'margin : 10px'>" . $singleOrder["number"];
                                                            }

                                                            echo "</article>
                                                                                            <div>
                                                                                        </td>
                                                                                            <td>" . $order["total"] . "</td>
                                                                                        </tr>";
                                                        }
                                                        echo "
                                                                                </tbody>
                                                                            </table>
                                                                        </article>
                                                                    </div>
                                                                </td>
                                                                <td>" . $row["amount"] . "</td>
                                                            </tr>
                                                        ";
                                                    }
                                                } catch (\Throwable $th) {
                                                    //throw $th;
                                                }
                                            } else {
                                                try {
                                                    $selectQuery = "SELECT users.name , orders.customer_id , SUM(total) as amount FROM orders JOIN users on users.id = orders.customer_id  GROUP by orders.customer_id;";
                                                    // $db = new PDO($dbn, $dbUser, $dbPassword);
                                                    include_once "databaseQueries/connection.php";
                                                    $results = $conn->query($selectQuery);

                                                    while ($row = $results->fetch()) {
                                                        echo "
                                                            <tr>
                                                                <td> 
                                                                    <div class'ac'>
                                                                        <input class='ac-input' id='ac-" . ++$divCount . "' name='ac-" . $divCount . "' type='checkbox' />
                                                                        <label class='ac-label' for='ac-" . $divCount . "'>" . $row["name"] . "</label>
                                                                        <article class='ac-text'>
                                                                            <table border = '5' class = 'table'>
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>order date</td>
                                                                                        <td>amount</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    ";
                                                        $ordersSelectQuery = "SELECT * from orders where orders.customer_id = " . $row["customer_id"];
                                                        $ordersResults = $conn->query($ordersSelectQuery);
                                                        while ($order = $ordersResults->fetch()) {
                                                            echo "<tr>
                                                                                        <td>
                                                                                            <div class='ac-sub'>
                                                                                            <input class='ac-input' id='ac-" . ++$divCount . "' name='ac-" . $divCount . "' type='checkbox' />
                                                                                            <label class='ac-label' for='ac-" . $divCount . "'>" . $order["created_at"] . "</label>
                                                                                            <article class='ac-sub-text'>";
                                                            $singleOrderQuery = "SELECT products.image ,order_product.number,order_product.order_id,order_product.product_id from order_product JOIN products on products.id = order_product.product_id WHERE order_product.order_id=" . $order["id"];
                                                            // echo "order id is  : ".$order["id"];
                                                            $singleOrderResults = $conn->query($singleOrderQuery);
                                                            while ($singleOrder = $singleOrderResults->fetch()) {
                                                                echo "<br><img src = '" . $singleOrder["image"] . "' width='50px' height= '50px' style= 'margin : 10px'>" . $singleOrder["number"];
                                                            }

                                                            echo "</article>
                                                                                            <div>
                                                                                        </td>
                                                                                            <td>" . $order["total"] . "</td>
                                                                                        </tr>";
                                                        }
                                                        echo "
                                                                                </tbody>
                                                                            </table>
                                                                        </article>
                                                                    </div>
                                                                </td>
                                                                <td>" . $row["amount"] . "</td>
                                                            </tr>
                                                        ";
                                                    }
                                                } catch (\Throwable $th) {
                                                    //throw $th;
                                                }
                                            }
                                            ?>



                                        </tbody>
                                    </table>
                                </section>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                        </div>
                    </div>

                </div>
                <!-- </section> -->
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
    <script src="../assets/js/TemplateJS/contact-form-script.js"></script>
    
    <!--===============================================================================================-->
    <!-- <script src="../assets/js/main.js"></script> -->
</html>
