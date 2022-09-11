<?php

session_start();
include "data_base.php";


if (isset($_GET['id'])) {
    $id_dl = $_GET['id'];


    $pro_title = $_POST['pro_title'];
    $pro_details = $_POST['pro_details'];
    $pro_brand = $_POST['pro_brand'];
    $pro_price = $_POST['pro_price'];

    $update = " UPDATE  product SET title= '$pro_title', price= '$pro_price', brand= '$pro_brand', description= '$pro_details' WHERE id= '$id_dl' ";


    $result = mysqli_query($conn, $update);
    if ($result) {
        function function_alert($message)
        {

            echo "<script>alert('$message');</script>";
            echo "<script>location.href='admin.php'</script>";
        }
        function_alert("Product updated successfully");
    } else {
        echo "error";
    }
}
