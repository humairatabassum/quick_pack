<!DOCTYPE html>

<?php

session_start();
if (isset($_SESSION['email'])) {
include 'navbar.php';

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderslip</title>

    <style>
      

        .header {
            text-align: center;
            font-size: 22px;
            color: black;
            padding: 20px;
            margin-bottom: 20px;
        }

        .container {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            margin-left: 8em;
        }

        .container-form {
            width: 600px;
            height: auto;
            background-color: #fff;
            border: 2px solid #fff;
            border-radius: 10px;
            box-shadow: 2px 2px 8px 2px #bbbbbb;
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .input-box {
            margin-bottom: 5px;
            margin-right: 20px;
            padding: 10px;
            font-size: 20px;
            outline: none;
        }


        .form-control {
            height: 20px;
            width: 50%;
            padding: 2px;
            font-size: 20px;
            outline: none;
            float: right;
            border: hidden;
        }

        .btn {
            color: #fff;
            font-size: 18px;
            outline: none;
            width: 120px;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            background: #ff9339;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>

</head>

<body>
    <div class="header">
        <h2>Order Slip</h2>
    </div>
    <div class="container">

        <div class="container-form">
            <?php

            include 'data_base.php';

            $users_email = $_SESSION['email'];



            $sql = "SELECT * FROM orders WHERE users_email ='$users_email'";
            $result = mysqli_query($conn, $sql);

            
            if (mysqli_num_rows($result) < 0) {
                echo "0 results";
            } else {
                            

            while ($info = mysqli_fetch_assoc($result)) {

            ?>

                <form method="POST" action="write_post.php" enctype="multipart/form-data">
                    <div class="input-box">
                        <b>Product Title:</b>
                        <input type="text" readonly class="form-control" value="<?php echo $info['product_title']; ?>" name="pro_title" required>
                    </div>
                    <div class="input-box">
                        <b>Quantity:</b>
                        <input type="text" readonly class="form-control" name="quantity" value="<?php echo $info['quantity']; ?>" required>
                    </div>

                    <div class="input-box">
                        <b>Total Price:</b>
                        <input type="text" readonly class="form-control" name="phone" value="<?php echo $info['product_price']; ?> tk" required>

                    </div>

                    <div class="input-box message-box">
                        <b>Address:</b>
                        <input type="text" readonly class="form-control" name="address" value="<?php echo $info['address']; ?>" required>
                    </div>
                    
                    <div class="input-box">
                        <b>Phone Number:</b>
                        <input type="text" readonly class="form-control" name="phone" value="<?php echo $info['phoneNumber']; ?>" required>
                    </div>
                    <br>
                </form>
            <?php
            }
        }
            ?>
        </div>
    </div>
</body>

</html>
<?php
} else {

    function function_alert($message)
    {

        echo "<script>alert('$message');</script>";
        echo "<script>window.location.href='home.php';</script>";
    }
    function_alert("Please Login First");
}
?>