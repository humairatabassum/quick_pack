<?php

session_start();
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
        .container{
            margin-top: 30px;
        }
        .btn {
            background-color: #ff822b;
            border: 2px solid #ff822b;
            color: black;
            padding: 8px 15px;
            text-align: center;
            text-decoration: wavy;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 0.5em;
            box-shadow: 2px 2px 8px 2px rgba(163, 163, 163, 0.938);
            color: orangered;
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
    <?php
    include 'navbar.php';
    include 'data_base.php';

    $sql = "SELECT * FROM product ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    while ($info = mysqli_fetch_array($result)) { ?>


        <div class="container">
            <div class="container-form">
                <ul class="list-iteam">
                    <li class="list-iteam">

                        <div>
                            <img src="image/<?php echo $info['img'] ?>" alt="........" width="100px" height="100px">
                        </div>

                        <div class="input-box">
                            <p class="text-field" name="pro_title">Product Title: <?php echo $info['title']; ?></p>
                        </div>

                        <div class="input-box">
                            <p class="text-field" name="price">Price: <?php echo $info['price']; ?></p>
                        </div>

                        <div class="input-box">
                            <p class="text-field" name="price">Brand name: <?php echo $info['brand']; ?></p>
                        </div>

                        <div class="input-box ">
                            <p class="text-field" name="price">Details: <?php echo $info['description']; ?></p>
                        </div>

                        <button class="btn btn-danger btn-sm"  style="margin:15px" type="submit" name="submit" onclick="window.location.href='admin.php?id=<?php echo $info['id'] ?>'">Delete</button>
                        <button class="btn btn-warning btn-sm" style="margin:15px" type="submit" name="submit1" onclick="window.location.href='update_post.php?id=<?php echo $info['id'] ?>'">Update</button>

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