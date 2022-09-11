<?php

include "data_base.php";
session_start();

if (isset($_POST['submit'])) {

    $id_order1 = $_GET['id_order'];
    $sql = "SELECT * FROM product WHERE id ='$id_order1'";
    $result = mysqli_query($conn, $sql);
    while ($info = mysqli_fetch_array($result)) {
        $pro_title = $info['title'];
        $price = $info['price'];


        //$pro_title= $_POST['pro_title'];
        $quantity = $_POST['quantity'];
        $address = $_POST['address'];
        $phone = $_POST['phonenumber'];
        //$price= $_POST['price'];

        if (empty($address) && empty($phone) && empty($quantity)) {
            // header('Location: login.php?error= Everything is required');
            exit();
        } else {
            $pro_price = $price * $quantity;

            $sql = "INSERT INTO orders (product_title, quantity, address, phoneNumber, product_price , product_id) 
        VALUES ('$pro_title', '$quantity', '$address', '$phone', '$pro_price', '$id_order1')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                function function_alert($message)
                {

                    echo "<script>alert('$message');</script>";
                    echo "<script>location.href='home.php'</script>";
                }
                function_alert("Order confirmed successfully");
            } else {
                header('Location: home.php?error= Something went wrong');
                exit();
            }
        }
    }
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .container-form {
            border: 2px solid #ffddd6;
            box-shadow: 2px 2px 10px 5px gray;
            margin: 50px;
            padding: 20px;
        }

        .btnOrder {
            background-color: #ff822b;
            border: 2px solid #ff822b;
            color: black;
            padding: 6px 10px;
            text-align: center;
            text-decoration: wavy;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 0.5em;
            box-shadow: 2px 2px 8px 2px rgba(163, 163, 163, 0.938);
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>


</head>

<body>
    </head>

    <body>
        <?php
        include 'navbar.php';
        include 'data_base.php';

        $id_order = $_GET['id'];

        $sql = "SELECT * FROM product WHERE id ='$id_order'";
        $result = mysqli_query($conn, $sql);

        while ($info = mysqli_fetch_array($result)) { ?>

            <div class="container">
                <div class="container-form">
                    <form method="POST" action="order_post.php" enctype="multipart/form-data">
                        <div hidden class="input-box">
                            <label><b>Id:</b></label>

                            <input type="number" readonly class="form-control" value="<?php echo $info['id']; ?>" name="pro_id" required>
                        </div>
                        <div class="input-box">
                            <label><b>Title</b></label>
                            <input type="text" readonly class="form-control" value="<?php echo $info['title']; ?>" name="pro_title" required>
                        </div>
                        <div class="input-box">
                            <label><b>Price</b></label>
                            <input type="number" readonly class="form-control" value="<?php echo $info['price']; ?>" name="pro_price" required>
                        </div>

                        <div class="input-box">
                            <label><b>Quantity:</b></label>
                            <input type="number" class="form-control" name="quantity" placeholder="product quantity" required>
                        </div>
                        <div class="input-box">
                            <label><b>address</b></label>
                            <input type="text" class="form-control" name="address" placeholder="Enter your adress" required>
                        </div>

                        <div class="input-box">
                            <label><b>Phone Number</b></label>
                            <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" required>
                        </div>

                        <div class="input-box">
                            <button class="btnOrder" type="submit" name="button">place order</button>
                        </div>
                    </form>
                <?php }
                ?>


                </div>
            </div>
    </body>

</html>