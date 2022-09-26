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
    <title>post item</title>
</head>

<style>
* {
    margin: 0px;
    padding: 0px;
}

body {
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #f7d8c4;
}

.header{
    text-align: center;
    font-size: 30px;
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
    margin: 10px;
}

.container-form {
    width: 600px;
    height: auto;
    background-color: #fff;
    border:2px solid #fff;
    border-radius: 10px;
    box-shadow: 2px 2px 8px 2px #bbbbbb;
    padding: 10px;
    display: flex;
    flex-direction: column;
}
.input-box{
    margin-bottom: 5px;
    margin-right: 20px;
    padding: 5px;
    font-size: 20px;
    outline: none;
}
.form-control{
    height: 30px;
    width: 100%;
    margin-right:20px ;
    margin-bottom: 5px;
    padding: 5px;
    font-size: 18px;
    outline: none;
}

.btn{
    color: #fff; 
    font-size: 16px; 
    outline: none; 
    width: 100px; 
    border: none; 
    padding: 8px 16px; 
    border-radius: 6px; 
    background: #ff9339; 
    cursor: pointer; 
    margin-top: 10px;
}
.btn:hover{
    opacity: 0.8;
}


</style>

<body>

        <div class="header">
            <h2>Upload New Product</h2>
        </div>
    <div class="container">

    <div class="container-form">
                
    
                <form method="POST" action="write_post.php" enctype="multipart/form-data">
                    <div class="input-box">
                    <label><b>Product Title:</b></label>
                        <input type="text" class="form-control" name="title" placeholder="Enter a product title" required>
                    </div>
                    <div class="input-box">
                    <label><b>Brand Name:</b></label>
                        <input type="text" class="form-control" name="brandName" placeholder="product brand name" required>
                    </div>

                    <div class="input-box message-box">
                    <label><b>Product Description:</b></label>
                        <textarea class="form-control" name="description" rows="10"  placeholder="Enter a short description of the product" required></textarea>
                    </div>
                    <div class="input-box">
                        <label><b>Product Price:</b> </label>
                        <input class="form-control" style="outline:none;" type="number" id="price" name="price" required>
                    
                    </div>

                    <br>
                    <label for="fileImg"><b>Upload produt image*</b></label>
                    <input id="fileImg" class="fileimg" type="file" placeholder="Choose a file" name="img"
                        require>
                    <input class="btn" type="submit" name="submit" value="Post">
                    <input class=" btn" type="submit" name="submit" value="cancel"  onclick="location.href='home.php'">
                </form>
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
    function_alert("Only admin can access this page");
}
?>