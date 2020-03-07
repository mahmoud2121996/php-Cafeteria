<?php
    session_start();
    include_once "validations/middleware.php";
    if (isset($_POST["update"])) {
        $updateQuery = "update users set name= ?, email= ?, is_admin=? , profile_path=? , room_No=?, Ext=? where id=?";

        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST["email"];
        $is_admin = $_POST["is_admin"];
        $room_No = $_POST["room_No"];
        $ext = $_POST["ext"];


        $imgPath = $_POST["profile_path"];

        if (isset($_FILES["file"]) && !empty($_FILES["file"])) {
            $images = "../assets/images/users/";
            $imageTmpName = $_FILES["file"]["tmp_name"];
            $imageName = $_FILES["file"]["name"];
            $fileType = $_FILES["file"]["type"];
            echo "file uploaded...";
            if ($fileType == "image/png" || $fileType == "image/jpeg") {
                if (move_uploaded_file($imageTmpName, $images . "/" . $imageName)) {
                    echo "image moved...";
                    $imgPath = $images . "/" . $imageName;
                } else {
                    echo "image is not png or jpg...";
                }
            }
        }


        try {

            include_once "databaseQueries/connection.php";
            if ($conn->prepare($updateQuery)->execute([$name, $email, $is_admin, $imgPath, $room_No, $ext, $id])) {
                echo "updated...";
            } else {
                echo "not updated..."; 
            }

           header('Location: userAll.php');
        } catch (\Throwable $sth) {

            //throw sth;
        }
    } else {
        $selectQuery = "select * from users where id = ?";

        try {
            include_once "databaseQueries/connection.php";
            $results = $conn->prepare($selectQuery);
            $results->execute([$_GET["id"]]);
            $row = $results->fetch();

            $name = $row['name'];
            $email = $row["email"];
            $is_admin = $row["is_admin"];
            $room_No = $row["room_No"];
            $ext = $row["Ext"];
            $imgPath = $row["profile_path"];
        } catch (\Throwable $th) {
            //throw $th;
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
					<h1>Update Users</h1>
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
                            <h2>Users</h2>
                            <p>Here you can update users data as Admin </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <form method="POST" action="update2.php"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2>Name</h2>
                                        <input type="text" class="form-control"  name="name" placeholder="Name" value="<?php echo $name;?>" required data-error="Please enter product Name">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2>Email</h2>
                                        <input type="text" class="form-control" name="email"  value="<?php echo $email;?>"  placeholder="Email" required data-error="Please enter product Name">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>
                                <input type='hidden' name='id' value="<?php echo $_GET["id"];?> ">
                                <input type='hidden' name='profile_path' value = " <?php echo $imgPath ?>">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2>Is Admin</h2>
                                        <input type="text" class="form-control" name="is_admin" value="<?php echo $is_admin;?>" placeholder="Product Name" required data-error="Please enter product Name">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2>Room No</h2>
                                        <input type="text" class="form-control" value="<?php echo $room_No;?>" name="room_No" placeholder="Room No" required data-error="Please enter product Name">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2>EXT</h2>
                                        <input type="text" class="form-control" name="ext"  value="<?php echo $ext;?>" placeholder="EXT" required data-error="Please enter product Name">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group"> 
                                        <h2>Profile Picture</h2>
                                        <input name="file" type="file" >
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
