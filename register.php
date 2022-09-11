<?php
    include "data_base.php";

$servername = "localhost";
$username = "root";
$password = "";
$database = "quickpack";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database );
// Check connection
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
    die("Connection failed: " . mysqli_connect_error());
}
    
    $first_name= $_POST['firstName'];
    $last_name= $_POST['lastName'];
    $phone= $_POST['phoneNumber'];
    $email= $_POST['email'];
    $password= $_POST['password1'];
    $confimpassword= $_POST['password2'];
    $address= $_POST['address'];

    if($password !== $confimpassword){

    function function_alert($message) {

            echo "<script>alert('$message');</script>";
            echo "<script>window.location.href='signup.html'</script>";  
        }
        function_alert("Password does not match");

    }else{
    

        $password=md5($password);

        $sql_r="SELECT * FROM users WHERE email='$email';";
        $rslt=mysqli_query($conn, $sql_r);

        if(mysqli_num_rows($rslt)>0){

            function function_alert($message) {
                echo "<script>alert('$message');</script>";
                echo "<script>window.location.href='signup.html'</script>";
            }
            function_alert("Email already exists");

            echo "<script>alert('Email already exists');</script>";

        }else{
        $sql="INSERT INTO users (first_name,last_name,phone,email,password,address, role) VALUES('$first_name', '$last_name', ' $phone', '$email', '$password', '$address','general')";

        $result = mysqli_query($conn, $sql);

        
        if(!$result){
            echo "<script>alert(something wrong)</script>";
        }else{
            header("location: home.php");
        }
    }
    }
    
    



?>