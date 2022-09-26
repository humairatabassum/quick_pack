<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
            rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Online Shopping</title>

    <style>
        body {
            /* background-color: #ffebe1; */
            background-color: #fff3dc;
        }
    </style>
</head>

<body class="p-3 m-0 border-0 bd-example">
    <nav class="navbar navbar-expand-lg bg-light" style="background-color: #ffcece ;">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php" style="color: orangered; font-size:28px; font-weight:700;">QuickPack</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                                    <a class="dropdown-item" href="post_item.php">Add Post</a>
                                <?php else : ?>
                                    <a class="dropdown-item" href="customer_order.php" >Order</a>
                                <?php endif; ?>

                            </li>

                            <li class="nav-item">
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                            <a class="dropdown-item" href="admin_order.php" >Orders</a>
                        <?php else : ?>
                            <a class="dropdown-item" href="customer_order.php">History</a>
                            
                        <?php endif; ?>
                    </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>

                    <li><a class="nav-link active" href="logout.php" style="color: red;">Log Out</a></li>

                </ul>


                    <?php if (
                        isset($_SESSION['email'])
                    ) {?>
                    <span class="material-icons icons-size-bg" style="color: black; font-size:35px; margin-right: 20px; padding-top: 5pxpx; cursor: pointer;" onclick="location.href='cart.php'">shopping_cart</span>
                    
                    <h5 style="color: orangered; font-size:20px ;">
                    <?php
                        echo $_SESSION['first_name'] . " " . $_SESSION['last_name'];
                    } else {
                    ?>
                        <a href="login.php">
                            <?php echo "<button type='button' class='btn btn-sm' style='background-color: #a4d6ff; margin:10px'>Login</button>";?>
                        <a href="signup.html">
                            <?php echo "<button type='button' class='btn btn-sm' style='background-color: #a4d6ff; margin:10px'>Signup</button>";
                        }
                            ?>
                </h5>

                <a href="admin.php">
                    <?php if (
                        isset($_SESSION['role']) && $_SESSION['role'] === 'admin'
                    ) {
                        echo "<button type='button' class='btn btn-warning btn-sm' style='margin:8px'>Admin Panel</button>";
                    }
                    ?></a>





            </div>
        </div>
    </nav>
</body>

</html>