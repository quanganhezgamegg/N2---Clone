<?php
require "./config/connectDB.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
    <link href="css/style6.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/shop.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/order.css">
    <title>TSL Shop</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
        rel="stylesheet">
    <style>
        article>h3 {
            text-align: center;
        }

        .change {
            margin-bottom: 40px;
        }
    </style>
</head>

<body>
    <?php require "header.php" ?>
    <?php 
        if (isset($_GET['order_id'])) {
            $id = $_GET['order_id'];
        }

        ?>
        <article>
            <h3>Chi tiết đơn hàng</h3>
            <div class="table table-responsive">
                <div class="change"><a class="btn btn-success" href="./order.php"><i class="fa-solid fa-angles-down fa-rotate-90"></i> Quay lại</a></div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (isset($_GET['invoice_id'])) {
                            $id = $_GET['invoice_id'];
                        }

                        $query = mysqli_query($conn, "SELECT * FROM order_detail AS O INNER JOIN products AS P ON O.product_id = P.id WHERE order_id = $id");
                        while ($row = mysqli_fetch_assoc($query)) {
                            $price = number_format($row['unit_price'],0,',','.');
                        ?>
                        <tr>
                            <td><img style="width: 100px;" src="<?=$row['product_image']?>" alt=""></td>
                            <td><?=$row['product_name']?></td>
                            <td><?=$row['quantity']?></td>
                            <td><?=$price?><sup>đ</sup></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </article>
    <?php require "footer.php" ?>
</body>

</html>