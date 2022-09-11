<!DOCTYPE html>

<?php
session_start();
include "data_base.php";


if (isset($_POST['u_email']) && isset($_POST['pass'])) {



    $u_email = trim($_POST['u_email']);
    $pass = trim($_POST['pass']);
    $u_email = stripslashes($_POST['u_email']);
    $pass = stripslashes($_POST['pass']);



    $pass = md5($pass);


    if (empty($u_mail) && empty($pass)) {
        header('Location: login.php?error= UserName is required');
        exit();
    } else {

        $sql = "SELECT * FROM users WHERE email='$u_email' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $u_email && $row['password'] === $pass) {
                $_SESSION['email'] = $u_email;
                $_SESSION['role'] = $row['role'];

                header("Location:home.php");
            }
        } else {

            function function_alert($message)
            {

                echo "<script>alert('$message');</script>";
            }
            function_alert("Incorrect password and username");
        }
    }
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <style>
        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }

        body {
            background-image: url('image/img1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background: #fbe2e5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }


        form {
            width: 500px;
            border: 2px solid white;
            box-shadow: 2px 2px 10px 5px gray;
            padding: 30px;
            border-radius: 15px;

        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }

        label {
            font-size: 20px;
            padding: 10px;
            font-weight: 700;
        }

        button {
            float: right;
            background: orangered;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }

        .container-form {
            align-items: center;
            justify-content: center;

        }

        button:hover {
            opacity: 0.7;
        }

        h3 {
            color: orangered;
            text-align: center;
            font-weight: 700;
            font-size: 25px;
            padding: 5px;
            margin-left: 10px;
            margin-right: 10px;

        }

        .btnRegister {
            position: relative;
            margin-left: 10px auto;
            padding-left: 10px;
            color: orangered;
            font-weight: 700;

        }
    </style>


</head>

<body>

    <div class="row container-login">
        <div class="col-md-3 container-form">

            <h2>Welcome to Online Shopping</h2>

        </div>

        <div class="col-md-6 register-form">


            <form method="POST" action="login.php">


                <div>
                    <h3>LOGIN</h3>
                </div>

                <div class="row register-form">
                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-1">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-1">
                                        <input type="email" class="form-control" id="email" name="u_email" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-1">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-1">
                                        <input type="password" class="form-control" id="password" name="pass" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type=" submit "> Login </button>
            </form>
        </div>

        <div class="col-md-6 container-form">
            <h4> Don't have an account?</h4>
            <input type="button" name="register" class="btnRegister" value="Register" onclick="location.href='signup.html'" />

        </div>
    </div>
</body>

</html>