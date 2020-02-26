<header class="top-navbar" style="z-index: 1000000;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="home.php">
                    <img src="../assets/images/ITIlogo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="home.php">Home</a></li>
                        <li class="nav-item "><a class="nav-link" href="orders.php">Orders</a></li>
                        <li class="nav-item"><a class="nav-link" href="checks.php">Checks</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a"
                                data-toggle="dropdown"><?php echo $_SESSION['name'] ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>

                    </ul>
                    &nbsp;
                    <img src="<?php echo $_SESSION['profile_path'] ?>" style="border-radius:50%;" width="8%" alt="User">

                </div>
            </div>
        </nav>
    </header>