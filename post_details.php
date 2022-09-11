<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>

<style>
* {
    margin: 0px;
    padding: 0px;
}

.container{
    width: 100%;
    height: 80%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px;
}

.img{
    margin-right:20px;
    border: 3px solid #0d1017;
    width: 500px;
    height: 500px;
    float: left;
    margin: 10px;
    padding: 10px;
}
.description{
    float: right;
    color: black;
    margin: 20px 10px;
    font-size: 16px;
    font-weight: 400;
    width: 300px;
}
.text-fields{
    font-weight: 600;
    font-size: 20px;
    float: inline-start;
}
.form{
    
    margin: 10px;
    float: left;
    margin-top:30em;
    margin-left:-400px


}
.btnCart{
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
    color: white;
}
.btnOrder{
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
    color: white;
}



</style>

</head>
<body>
    <?php
    include "navbar.php";
    include "data_base.php";


    $id=$_GET['id'];


    $sql="SELECT * FROM product WHERE id ='$id'";
    $result=mysqli_query($conn,$sql);

    while($info=mysqli_fetch_array($result)){
    ?>
    <div class="container">
        <label class="label1">
        <img src="image/<?php echo $info['img']; ?>" alt=".....image...." class="img">
        <p class="description"><?php echo $info['description']; ?></p>


        <div class="text-fields">
            <p class="text-field">Title: <?php echo $info['title']; ?></p>
            <p class="text-field" >Brand Name: <?php echo $info['brand']; ?></p>
            <p class="text-field" style="color: red;">Price: <?php echo $info['price']; ?></p>
        </div>
        </label>
        <div class="form">
                <button class="btnOrder" type="button" name="details" onclick="window.location.href='order.php?id=<?php echo $id ?>'">Buy Now</button> 
                <button class="btnCart" type="submit" name="submit" onclick="window.location.href='cart_save.php?id=<?php echo $id ?>'">Add to Cart</button>
        </div>


    <?php
    }

    ?>
</body>
</html>