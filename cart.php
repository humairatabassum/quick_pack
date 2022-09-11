<?php

session_start();
include "data_base.php";


if (isset($_GET['id'])) {
    $id_dl = $_GET['id'];
    $u_mail = $_SESSION['email'];
    echo $id_dl;


    $delete = "DELETE FROM cart WHERE users_id  = '$u_mail' AND id = '$id_dl'";
    $result = mysqli_query($conn, $delete);
    if ($result) {

        function function_alert($message)
        {

            echo "<script>alert('$message');</script>";
            echo "<script>window.location.href='home.php';</script>";
        }
        function_alert("Removed from cart");
    } else {
        echo "error";
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .container {
            width: 100%;
            background-color: red;
            margin: 20px;
            padding: 20px;


        }

        .container-form {

            border: 2px solid #ffddd6;
            padding: 20px;
            border-radius: 0.5em;
            box-shadow: 2px 2px 8px 2px rgba(163, 163, 163, 0.938);
            background-color: white;
            display: inline-block;
            margin: 20px;
            padding: 20px;

        }
        .text-field{
            font-size: 20px;
            font-weight: 600;
        }
    </style>
</head>



<body>


    <?php
    include 'navbar.php';
    include 'data_base.php';

    $users_email = $_SESSION['email'];



    $sql = "SELECT * FROM cart WHERE users_id ='$users_email'";
    $result = mysqli_query($conn, $sql);

    while ($info = mysqli_fetch_assoc($result)) { ?>

        
            <div class="container-form">
                <ul class="list-iteam">
                    <li class="list-iteam">


                        <div class="input-box">
                            <p class="text-field" name="pro_title">Product Title: <?php echo $info['pro_title']; ?></p>
                        </div>

                        <div class="input-box">
                            <p class="text-field" name="price">Price: <?php echo $info['pro_price']; ?></p>
                        </div>

                        <button class="btn btn-danger btn-sm" type="submit" name="submit" onclick="window.location.href='cart.php?id=<?php echo $info['id'] ?>'">Delete</button>
                        <button class="btn btn-info btn-sm" style="" type="submit" name="submit" onclick="window.location.href='order.php?id=<?php echo $info['pro_id'] ?>'">confirm Order</button>

                    </li>
                </ul>

            </div>

    <?php
    }

    ?>
</body>

</html>