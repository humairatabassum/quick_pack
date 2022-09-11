<?php

session_start();
include 'navbar.php';


if (isset($_SESSION['email'])) {
include "data_base.php";


if (isset($_GET['id'])) {
    $id_dl = $_GET['id'];
    echo $id_dl;


    $delete = "DELETE FROM product WHERE id = '$id_dl'";
    $result = mysqli_query($conn, $delete);
    if ($result) {
        function function_alert($message)
        {

            echo "<script>alert('$message');</script>";
            echo "<script>location.href='admin.php'</script>";
        }
        function_alert("Product Deleted successfully");
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
    <title>Admin</title>

    <style>
        .header {
            text-align: center;
            font-size: 22px;
            color: black;
            padding: 20px;
            margin-bottom: 20px;
        }

        .container{
            margin-top: 30px;
        }

        .list-iteam {
            
            background-color: white;
            border: 2px solid #ffddd6;
            box-shadow: 2px 2px 5px 2px gray;
        }
        .text-field{
            font-weight: 600;
        }
    </style>
</head>

<body>
<div class="header">
        <h2>Order List</h2>
    </div>

    <?php
    include 'data_base.php';

    $sql = "SELECT * FROM orders ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    while ($info = mysqli_fetch_array($result)) { ?>


        <div class="container">
            <div class="container-form">
                <ul class="list-iteam">
                    <li class="list-iteam">

                        <div class="input-box">
                            <p class="text-field" name="pro_title">Product Title: <?php echo $info['product_title']; ?></p>
                        </div>

                        <div class="input-box">
                            <p class="text-field" name="price">Price: <?php echo $info['product_price']; ?></p>
                        </div>

                        <div class="input-box">
                            <p class="text-field" name="quantity">Brand name: <?php echo $info['quantity']; ?></p>
                        </div>

                        <div class="input-box ">
                            <p class="text-field" name="address">Address: <?php echo $info['address']; ?></p>
                        </div>

                        <div class="input-box ">
                            <p class="text-field" name="Phone">Phone Number: <?php echo $info['phoneNumber']; ?></p>
                        </div>

                        <div class="input-box ">
                            <p class="text-field" name="user_mail">UserName: <?php echo $info['users_email']; ?></p>
                        </div>

                    </li>

                </ul>

            </div>
        </div>



    <?php
    }
    ?>


</body>

</html>
<?php
} else {
    header("Location: login.php");
}
?>