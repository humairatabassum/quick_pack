<?php
session_start();
if (isset($_SESSION['email'])) {
?>

    <!DOCTYPE html>



    <html lang="en">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Shopping</title>

        <style>
            .card {
                width: 40vh;
                height: 50vh;
                border: 2px solid white;
                background-color: white;
                border-radius: 0.5em;
                padding: 5px;
                margin-top: 20px;
                margin-left: 50px;
                margin-right: 10px;
                margin-bottom: 10px;
                box-shadow: 2px 2px 10px 2px rgba(163, 163, 163, 0.938);
                float: left;

            }

            img {
                width: 50%;
                height: 50%;
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
                font-size: 22px;
                font-weight: bold;
                margin: 10px;
                padding: 10px;
            }

            .card-title2 {
                font-size: 22px;
                font-weight: bold;
                margin: 10px;
                padding: 10px;
                color: red;
            }

            .card-text {
                width: auto;
                height: 80px;
                max-height: 150px;
                overflow: hidden;
            }

            a {
                float: left;
            }

            .btnBuy {
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

            .display {
                float: right;
                margin-top: -70px;
                margin-right: 20px;
                color: red;
            }
        </style>
    </head>

    <body>

        <?php
        include "navbar.php";
        ?>
        <div class="container">
            <?php
            include 'data_base.php';

            $sql = "SELECT * FROM product ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
            ?>

                <div class="card">

                    <div class="card-header">
                        <img src="image/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <label id="label1">
                            <h3 class="card-title1" style=>Title: <?php echo $row['title']; ?> </h3>
                            <p class="card-title2"> Price: <?php echo $row['price']; ?></p>
                        </label>
                        <p class="card-text1" style="font-weight: 600; margin-left:15px">Brand Name: <?php echo $row['brand']; ?></p>
                        <a href="order.php?id=<?php echo $row['id']; ?>" class="btn btnBuy">Buy Now</a>
                    </div>

                    <form action="post_details.php" method="POST">
                        <a style="font-size:20px " class="display" href="post_details.php?id=<?php echo $row['id']; ?>">Details</a>
                    </form>
                </div>
            <?php
            }
            ?>

        </div>

    </body>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>