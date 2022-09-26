<?php

session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] === 'admin') {
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        .container-form {
            height: 100%;
            width: 100%;
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
        .container-form {
            border: 2px solid #ffddd6;
            padding: 20px;
            border-radius: 0.5em;
            box-shadow: 2px 2px 8px 2px rgba(163, 163, 163, 0.938);
            background-color: white;
            display: inline-block;
        }
        .input-box{
            font-size: 20px;
            font-weight: 700px;
        }
       
    </style>


</head>

<body>
    <?php
    include 'navbar.php';
    include 'data_base.php';

    $id_dl = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id ='$id_dl'";
    $result = mysqli_query($conn, $sql);

    while ($info = mysqli_fetch_array($result)) { ?>


        <div class="container">
            <div class="container-form">
                <ul class="list-iteam">
                    <li class="list-iteam">

                        <form action="admin_task.php?id=<?php echo $info['id']; ?>" method="POST">

                            <div hidden class="input-box">
                                <label class="input-box">Product Id</label>
                                <input type=text class="text-field" name="pro_title" value=" <?php echo $info['id']; ?>">
                            </div>
                            <div class="input-box">
                                <label class="input-box">Product Title</label>
                                <input type=text class="text-field" name="pro_title" value=" <?php echo $info['title']; ?>">
                            </div>

                            <div class="input-box">
                                <label  class="input-box">Product Price</label>
                                <input type=text class="text-field" name="pro_price" value=" <?php echo $info['price']; ?>">
                            </div>

                            <div class="input-box"  class="input-box">
                                <label>Product Brand Name</label>
                                <input type=text class="text-field" name="pro_brand" value="<?php echo $info['brand']; ?>">
                            </div>

                            <div class="input-box "  class="input-box">
                                <label>Product Description</label>
                                <input type=text class="text-field" name="pro_details" value=" <?php echo $info['description']; ?>">
                            </div>

                            <button class="btnOrder" type="submit" name="button">Update Data</button>
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

    function function_alert($message)
    {

        echo "<script>alert('$message');</script>";
        echo "<script>window.location.href='home.php';</script>";
    }
    function_alert("Only admin can access this page");
}
?>