<?php
session_start();
include_once "validations/middleware.php";
$divCount=0;
if(isset($_POST['submit']))
{ 
    
    $target_dir = "../assets/images/products/";
    $file_name = $_FILES['productPicture']['name'];
    $target_file = $target_dir.$file_name;
    try 
    {
        // $pdo = new PDO($dsn, $user, $passwd);
        include_once "databaseQueries/connection.php";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO products (product_name,price,category_id,image) VALUES (?,?,?,?)";
        $stmtInsert= $conn->prepare($sql);
        $stmtInsert->execute([ $_POST['productName'],$_POST['price'],$_POST['category'],$target_file ]);
        $source = $_FILES["productPicture"]['tmp_name'];
       move_uploaded_file($source,$target_file);
        // if (copy($source, $target_file)) {
        //     echo "File is valid, and was successfully uploaded.\n";
        //   } else {
        //      echo "Upload failed";
        //   }
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
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
    <!-- Responsive CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/responsive.css"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
					<h1>Add Products</h1>
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
                            <h2>Checks</h2>
                            <p>Here you can see all checks and their details </p>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-lg-12">
                    <form method="POST"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2>Product</h2>
                                        <input type="text" class="form-control" name="productName" placeholder="Product Name" required data-error="Please enter product Name">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2>Price</h2>
                                        <div class="div" style="display: flex;">
                                            <input type="number" step="0.01" placeholder="Price" style="width: 10%;" class="form-control" name="price" required data-error="Please enter price">
                                            <h1 style="margin-left: 10px; margin-top: 10px;">EGP</h1>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <h2>Category</h2>
                                    <div style="display: flex;">
                                        <div class="form-group" style="flex-basis: 87%;">
                                            <select class="custom-select d-block form-control" name="category" required data-error="Please Select Category">
                                            <option disabled selected>Please Select Category*</option>
                                            <option value="1">Hot Drinks</option>
                                            <option value="2">Cold Drinks</option>
                                            <option value="3">Meals</option>
                                            <option value="4">Fruits</option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <a href="#" style="margin-left: 10px; margin-top: 10px;font-size: larger;flex-basis: 13%;">Add New Category</a> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"> 
                                        <h2>Product Picture</h2>
                                        <input class="input100" type="file" name="productPicture" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center" style="display: flex;">
                                        <button class="btn btn-common" id="reset" type="reset">Reset</button>
                                        <button class="btn btn-common"name="submit" type="submit" style="opacity: 1;margin-left: 5px;">Save</button>
                                        <div id="msgSubmit" style="margin-left: 50px;margin-top: 10px;" class="h3 text-center hidden"></div> 
                                        <div class="clearfix"></div> 
                                        
                                    </div>
                                </div>
                            </div>            
                    </form>
                    </div>
                </div>
            </div>
        </div> -->

        <div id="tabs" class="project-tab" style="margin-top: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Checks</a>

                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <?php ?>
                                <!-- inputs -->
                                <form action="checks.php" method="POST">
                                    <label for="dateFrom"> from</label>
                                    <input type="date" name="dateFrom" class="date">
                                    <label for="dateTo"> to</label>
                                    <input type="date" name="dateTo" class="date">
                                    <input type="submit" name="selectDate" value="filter by date">
                                    <br>
                                    <label for="users">users : </label>
                                    <select name="users" id="">
                                        <?php
                                        include_once "databaseQueries/connection.php";
                                        try {
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
                                    <input type="submit" name="selectUser" value="filter by user">
                                </form>
                                <!-- checks -->
                                <section class="container">
                                    <table border="5">
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
                                                                            <table border = '5'>
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>order date</td>
                                                                                        <td>amount</td>
                                                                                    </tr>s
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
                                                                            <table border = '5'>
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
                                                                            <table border = '5'>
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
<script src="../assets/js/admin/checks.js"></script> 

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
    <link rel="stylesheet" href="../assets/css/checks.css">
    <!--===============================================================================================-->
    <!-- <script src="../assets/js/main.js"></script> -->
</html>
