<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Orders</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../assets/images/icons/concierge-bell-solid.svg" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="myOrder.css">
    <!--===============================================================================================-->
    <link data-require="bootstrap@3.3.2" data-semver="3.3.2" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <script data-require="bootstrap@3.3.2" data-semver="3.3.2" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script data-require="jquery@2.1.3" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- <link rel="stylesheet" href="myOrder.css" /> -->
    <script src="moment-2.10.3.js"></script>
    <script src="bootstrap-datetimepicker.js"></script>

</head>

<body>
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
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item active"><a class="nav-link" href="orders.php">My Orders</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Dalia</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="userAdd.php">Make Order</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>

                    </ul>
                    &nbsp;
                    <img src="../assets/images/users/girl.png" width="6%" alt="User">

                </div>
            </div>
        </nav>
    </header>
    <div class="Datecontainer">
        <div class='col-md-5'>
            <div class="form-group">
                <label>Date To:</label>
                <div class='input-group date' id='datetimepicker6'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class='col-md-5'>
            <div class="form-group">
                <label>Date From:</label>
                <div class='input-group date' id='datetimepicker7'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section id="tabs" class="project-tab">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Project Tab 1</a>
                            </div>
                        </nav> -->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <table class="table" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#">Work 1</a></td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                        <td> Cancel</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Work 2</a></td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                        <td> Cancel</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Work 3</a></td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                        <td> Cancel</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        $(function() {
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker();
            $("#datetimepicker6").on("dp.change", function(e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function(e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>

</body>

</html>