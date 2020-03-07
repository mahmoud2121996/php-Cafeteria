<?php

session_start();
include_once "validations/middleware.php";

    if (isset($_POST["update"])) {
        $updateQuery = "update products set product_name=?,price= ?, category_id=? , image = ? where id = ?";        
        $productId = $_POST["id"];
        $productName = $_POST["product_name"];
        $productPrice = $_POST["price"];
        $categoryId = $_POST["category_id"];
        $productImage = $_POST["old_image"];

        if (isset($_FILES["image"]) && !empty($_FILES["image"])) {
            $filesPath = "../assets/images/products/";
            $tmpName = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            if ($_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg") {

                if (move_uploaded_file($tmpName, $filesPath."/"."$fileName")) {
                    $img = $filesPath . "/" . $fileName;
                    $productImage=$img ;
                    echo "<br>file moved...<br>";
                } else {
                    echo "<br>error in moving the file...<br>";
                }
            } else {
                echo "this file is not png or jpg image";
            }
        }



        try {
          
            include_once "databaseQueries/connection.php";
            if ($conn->prepare($updateQuery)->execute([$productName, $productPrice, $categoryId, $productImage, $productId])) {
                echo $productImage;
                echo "updated...";
            } else {
                echo "not updated...";
            }

           header('Location: productAll.php');
        } catch (\Throwable $th) {
           echo "kkk";
        }
    } else {
        $selectQuery = "select * from products where id = ?";
        try {
            include_once "databaseQueries/connection.php";
            $results = $conn->prepare($selectQuery);
            $results->execute([$_GET["id"]]);
            $row = $results->fetch();

            $productName = $row["product_name"];
            $productPrice = $row["price"];
            $categoryId = $row["category_id"];
            $productImage = $row["image"];
        
        } catch (\Throwable $th) {
            echo "gfgf";
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
    <title>Update Users</title>  
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
    <?php include_once "navBar/navBar.php"  ?> 
    <!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Update products</h1>
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
                            <h2>Products</h2>
                            <p>Here you can update products data as Admin </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <form method="POST" action="updateProducts2.php"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2>Name</h2>
                                        <input type="text" class="form-control"  name="product_name" placeholder="product_name" value="<?php echo $productName;?>" required data-error="Please enter product Name">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2>Price</h2>
                                        <input type="text" class="form-control" name="price"  value="<?php echo $productPrice;?>"  placeholder="Product Price" required data-error="Please enter product price">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>
                                <input type='hidden' name='id' value = "<?php echo  $_GET["id"] ?>">
                                 <input type='hidden' name='old_image' value = "<?php echo $productImage ?> ">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2>Category Id</h2>
                                        <input type="text" class="form-control" name="category_id" value="<?php echo $categoryId;?>" placeholder="category Id" required data-error="Please enter Category Id">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>

                               

                                
                                
                                <div class="col-md-12">
                                    <div class="form-group"> 
                                        <h2>Product Picture</h2>
                                        <input name="image" type="file" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center" style="display: flex;">
                                        <!-- <button class="btn btn-common" id="reset" type="reset">Reset</button> -->
                                        <button class="btn btn-common"name="update" type="submit" style="opacity: 1;margin-left: 5px;">update</button>
                                        <!-- <div id="msgSubmit" style="margin-left: 50px;margin-top: 10px;" class="h3 text-center hidden"></div>  -->
                                        <div class="clearfix"></div> 
                                        
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
    <script src="../assets/js/TemplateJS/contact-form-script.js"></script>
    
    <!--===============================================================================================-->
    <!-- <script src="../assets/js/main.js"></script> -->
</html>
