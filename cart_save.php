<?php

include "data_base.php";
session_start();

$id_cart = $_GET['id'];
$users_email = $_SESSION['email'];


$sql = "SELECT * FROM product where id='$id_cart'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $pro_id = $row['id'];
        $pro_title = $row['title'];
        $pro_price = $row['price'];

        $sql_cart = "INSERT INTO cart (pro_title,pro_id,pro_price,users_id) 
            VALUES ('$pro_title','$pro_id','$pro_price','$users_email')";
        $result = mysqli_query($conn, $sql_cart);
        if ($result) {

            function function_alert($message)
        {

            echo "<script>alert('$message');</script>";
            echo "<script>location.href='cart.php'</script>";
        }
        function_alert("Add a Product to Cart successfully");

            $temp = 0;
            $temp++;
            if ($temp == 1) {
                break;
            }
        } else {
            echo "error";
        }
    }
}
