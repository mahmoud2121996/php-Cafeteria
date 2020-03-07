<?php
session_start();
include_once "validations/middleware.php";
include_once "validations/randomString.php";

if(isset($_POST['submit']))
{ 
    
    

    $path = $_FILES['productPicture']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);

    $target_dir = "../assets/images/products/";
    $new_name =generateRandomString().".".$ext;
    $target_file = $target_dir.$new_name;
    $get_file="../assets/images/products/".$new_name;

    try 
    {
        include_once "databaseQueries/connection.php";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO products (product_name,price,category_id,image) VALUES (?,?,?,?)";
        $stmtInsert= $conn->prepare($sql);
        $stmtInsert->execute([ $_POST['productName'],$_POST['price'],$_POST['category'],$get_file ]);
        $source = $_FILES["productPicture"]['tmp_name'];
        move_uploaded_file($source,$target_file);
        header("location:productAll.php");
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
try {
    include_once "databaseQueries/connection.php";
    $stmAll = $conn->query("SELECT * FROM category_product");
    $categoriesAll = $stmAll->fetchAll(PDO::FETCH_NUM);
} catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
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
                            <h2>Products</h2>
                            <p>Here you can add new products and their details </p>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                                                    <?php  foreach ($categoriesAll as $category):?>
                                                    <option value="<?php echo $category[0] ?>"><?php echo $category[1] ?></option>                                                   
                                                    <?php endforeach; ?>
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
    <script src="../assets/js/main.js"></script>
</html>
