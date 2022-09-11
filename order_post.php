<?php

include "data_base.php";
session_start();




    $pro_id= $_POST['pro_id'];
    $pro_title= $_POST['pro_title'];
    $quantity= $_POST['quantity'];
    $address= $_POST['address'];
    $phone= $_POST['phonenumber'];
    $price= $_POST['pro_price'];
    $users_mail=$_SESSION['email'];





    if (empty($address) && empty($phone)&& empty($quantity)) {
       // header('Location: login.php?error= Everything is required');
        exit();
    }else{
        $pro_price= $price*$quantity;


        $sql= "INSERT INTO orders (product_id,product_title, quantity, address, phoneNumber, product_price , users_email) 
        VALUES ('$pro_id','$pro_title', '$quantity', '$address', '$phone', '$pro_price', '$users_mail')"; 
        $result= mysqli_query($conn, $sql);

        if($result){
            function function_alert($message)
        {

            echo "<script>alert('$message');</script>";
            echo "<script>location.href='customer_order.php'</script>";
        }
        function_alert("Order confirmed successfully");

            
            

        }else{
            header('Location: home.php?error= Something went wrong');
            exit();
        }
    }
?>
    


    