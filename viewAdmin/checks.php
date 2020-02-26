<?php
session_start();
include_once "validations/middleware.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/navbar.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="view-users.css">
<link rel="stylesheet" href="../assets/css/checks.css">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->
</head>

<div>

    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="../assets/images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li>
                        <li class="nav-item "><a class="nav-link" href="orders.php">Orders</a></li>
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

    <body>
        <!-- <section id="tabs" class="project-tab"> -->
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
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav
              -home-tab">
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
                                                    $results = $pass->query($selectQuery);

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
</body>

</html>
