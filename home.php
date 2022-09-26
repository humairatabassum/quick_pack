<!DOCTYPE html>



<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Shopping</title>

    <style>

        * {
            margin: 0px;
            padding: 0px;
        }
        .container-img {
            /* background-image: url("image/homeimg.jpg"); */
            margin-top: 2em;
            margin-bottom: 3em;
            margin-right: 20px;
            position: static;
        }

        .card {
            width: 190px;
            height: 200px;
            border: 2px solid white;
            background-color: white;
            border-radius: 0.5em;
            padding: 2px;
            margin: 2px 4px;
            box-shadow: 2px 2px 5px 1px rgba(163, 163, 163, 0.938);
            float: left;


        }

        .card-img-top {
            display: block;
            margin-left: auto;
            margin-right: auto;
            background-position: 50% 50%;
            /* margin-left: 30px;
                margin-right: 30px; */
            max-width: 150px;
            height: 150px;
            float: inline-start;
        }

        #label1 {
            display: inline-block;
        }

        .card:hover {
            box-shadow: 2px 2px 10px 2px rgba(163, 163, 163, 0.938);
            transform: scale(0.9);
            transition: 1s;

        }

        .card-title1 {
            font-size: 15px;
            font-weight: bold;
            margin-left: 2px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            width: 150px;
        }

        .card-title2 {
            font-size: 13px;
            margin-left: 2px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            width: 150px;

        }

        .card-text {

            font-size: 15px;
            margin-top: -15px;
        }

        a {
            float: left;
        }

        .btnBuy {
            background-color: #ff822b;
            border: 2px solid #ff822b;
            color: black;
            padding: 4px 8px;
            text-align: center;
            text-decoration: wavy;
            display: inline-block;
            font-size: 12px;
            margin-right: 6px;
            cursor: pointer;
            border-radius: 0.5em;
            box-shadow: 2px 2px 8px 2px rgba(163, 163, 163, 0.938);
            color: white;
        }

        .display {
            float: right;
            margin-bottom: 5px;
            margin-right: 8px;
            margin-left: 5px;
            color: red;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    include "navbar.php";
    ?>
    <div class="container">
        <div class="container-img">
            <img src="image/home.jpg" alt="home_image" style="width:1150px;height:350px;">
        </div>
        <?php
        include 'data_base.php';

        $sql = "SELECT * FROM product ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
        ?>



            <div class="card" onclick="window.location.href='post_details.php?id=<?php echo $row['id']; ?>'">


                <div class="card-header">
                    <img src="image/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <label id="label1">
                        <h3 class="card-title1" style=><?php echo $row['title']; ?> </h3>
                        <p class="card-title2"> Brand: <?php echo $row['brand']; ?></p>
                    </label>
                    <p class="card-text" style="color: red ; font-weight: 700; margin-left:2px">BDT <?php echo $row['price']; ?></p>

                    <a href="order.php?id=<?php echo $row['id']; ?>" class="btnBuy">Buy Now</a>

                    <form action="post_details.php" method="POST" class="display">
                        <a style="font-size:12px " class="display" href="post_details.php?id=<?php echo $row['id']; ?>">Details</a>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>

    </div>

</body>

</html>