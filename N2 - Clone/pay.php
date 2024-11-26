<?php
require "./config/connectDB.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id']; 
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $totalPrice = 0;
        
        foreach ($_SESSION['cart'] as $cart_item) {
            $priceNew = $cart_item['price'] - ($cart_item['price'] * ($cart_item['discount'] / 100));
            $price = $cart_item['discount'] > 0 ? $priceNew : $cart_item['price'];
            $quantity = $cart_item['quantity'];
            $total = $price * $quantity;
            $totalPrice += $total;
        }

        if ($cart_item['price'] > 0) {
            $sql = "INSERT INTO orders (user_id, order_date, total_amount, order_status)
                    VALUES ($user_id, NOW(), $totalPrice, 'Chờ xác nhận')";
            if (mysqli_query($conn, $sql)) {
                $order_id = mysqli_insert_id($conn); 
                foreach ($_SESSION['cart'] as $cart_item_2) {
                    $productId = $cart_item_2['product_id'];
                    $quantity = $cart_item_2['quantity'];
                    $price = $cart_item_2['price'] - ($cart_item_2['price'] * ($cart_item_2['discount'] / 100));
                    $priceNew = $cart_item_2['discount'] > 0 ? $price : $cart_item_2['price'];
                    $sql2 = "INSERT INTO order_detail
                    (order_id, product_id, quantity, unit_price) 
                    VALUES($order_id, $productId, $quantity, $price)";
                    mysqli_query($conn, $sql2);
                }
    
                $update_user = mysqli_query($conn, "UPDATE users SET name = '$name', phone = $phone, address = '$address' WHERE id = $user_id");
                if ($update_user) {
                    unset($_SESSION['cart']);
                    header('location: ./thanks.php');
                }
            }
        }else {
            header('location: ../pay/thanks.php');
        }

    }
}
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
    <link rel="stylesheet" href="./css/pay.css">
    <title>TSL Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
        rel="stylesheet">
</head>

<body>
    <?php require("header.php"); ?>
    <div class="container">
        <article>
            <div class="content-article">
                <h3>Thanh toán</h3>
                <h5>Thông tin giao hàng</h5>
                <form action="" method="POST">
                    <div class="my-info">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $id = $_SESSION['user_id'];
                        }
                        $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
                        $row = mysqli_fetch_assoc($query);
                        $phone = $row['phone'] == 0 ? '' : $row['phone'];
                            ?>
                        <div class="name">
                            <input type="text" name="name" value="<?= $row['name'] ?>"
                                placeholder="Tên người dùng" required>
                        </div>
                        <div class="email">
                            <input type="email" name="email" value="<?= $row['email'] ?>" placeholder="email"
                                required>
                        </div>
                        <div class="phone-2">
                            <input type="text" name="phone" value="<?=$phone?>"
                                placeholder="Số điện thoại" required>
                        </div>
                        <div class="address">
                            <input type="text" name="address" value="<?= $row['address'] ?>" placeholder="Địa chỉ"
                                required>
                        </div>
                    </div>
                    <div class="ship-method">
                        <h5>Phương thức vận chuyển</h5>
                        <div class="ship-price">
                            <span>Ship nhanh, an toàn</span>
                        </div>
                    </div>
                    <div class="pay-method">
                        <h5>Phương thức thanh toán</h5>
                        <div class="pay-item">
                            <div class="cod-pay">
                                <div class="tick-circle">
                                    <i id="i1" class="fa-solid fa-circle"></i>
                                </div>
                                <div class="cod-item">
                                    <p>Thanh toán khi nhận hàng (COD)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-click">
                        <div class="change-cart">
                            <a href="./cart.php"><i class="fa-solid fa-arrow-right fa-rotate-180"></i> Giỏ
                                hàng</a>
                        </div>
                        <button name="submit">Hoàn tất đơn hàng</button>
                    </div>
                </form>
            </div>
        </article>
        <aside>
            <div class="show-cart"><i class="fa-solid fa-cart-shopping"></i> Xem thông tin đơn hàng <i
                    class="fa-solid fa-caret-down"></i></div>
            <div class="hide-product">
                <div class="product">
                    <?php
                    $totalPrice = 0;
                    foreach ($_SESSION['cart'] as $cart_item) {
                        $priceNew = $cart_item['price'] - ($cart_item['price'] * ($cart_item['discount'] / 100));
                        $price = $cart_item['discount'] > 0 ? $priceNew : $cart_item['price'];
                        $quantity = $cart_item['quantity'];
                        $total = $price * $quantity;
                        $priceF = number_format($price, 0, ',', '.');
                        $totalF = number_format($total, 0, ',', '.');
                        $totalPrice += $total;
                        ?>
                        <div class="product-item">
                            <div class="product-img">
                                <img src="<?= $cart_item['product_image'] ?>" alt="">
                                <span>
                                    <?= $quantity ?>
                                </span>
                            </div>
                            <div class="name-product">
                                <h4>
                                    <?= $cart_item['product_name'] ?>
                                </h4>
                            </div>
                            <div class="price"><span>
                                    <?= $priceF ?>
                                </span> VNĐ</div>
                        </div>
                    <?php } ?>
                </div>
                <div class="voucher">
                    <form action="">
                        <input type="text" placeholder="Mã giảm giá">
                        <button disabled>Sử dụng</button>
                    </form>
                </div>
                <div class="prepare">
                    <div class="price-product">
                        <span>Tạm tính</span>
                        <p><span>
                                <?php echo number_format($totalPrice, 0, ',', '.'); ?>
                            </span> VNĐ</p>
                    </div>
                    <div class="price-ship">
                        <span>Tiền vận chuyển</span>
                        <p>Free ship</p>
                    </div>
                </div>
                <div class="sum-price">
                    <span>Tổng cộng</span>
                    <?php $priceShip = $totalPrice > 500000 ? 0 : 30000; ?>
                    <p><span>
                            <?php $num = $totalPrice + $priceShip;
                            echo number_format($num, 0, ',', '.'); ?>
                        </span> VNĐ</p>
                </div>
            </div>
        </aside>
    </div>
    <?php require("footer.php"); ?>
</body>

</html>