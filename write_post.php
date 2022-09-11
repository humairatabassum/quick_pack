<?php

include "data_base.php";



if (isset($_POST['submit'])) {



    $title = $_POST['title'];
    $brandName = $_POST['brandName'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $img = $_FILES['img']['name'];
    $img_type = $_FILES['img']['type'];
    $img_size = $_FILES['img']['size'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_store = "image/" . $img;



    move_uploaded_file($img_tmp, $img_store);

    if (empty($title) && empty($brandName) && empty($description) && empty($price) && empty($img)) {
        header('Location: login.php?error= Everything is required');
        exit();
    } else {
        $sql = "INSERT INTO product (title, brand, description, price, img) 
    VALUES ('$title', '$brandName', '$description', '$price', '$img')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('Location: home.php?success= Product has been posted');
            exit();
        } else {
            header('Location: home.php?error= Something went wrong');
            exit();
        }
    }
}
