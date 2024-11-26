<?php
require "./config/connectDB.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
    }else {
        $quantity = 1;
    }

    if (isset($_POST["product_id"])) {
        $product_id = $_POST["product_id"];
        $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id");
        $row = mysqli_fetch_assoc($result);

        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $product_exists = false;

        foreach ($_SESSION['cart'] as $key => $cart_item) {
            if ($cart_item['product_id'] == $product_id) {
                $_SESSION['cart'][$key]['quantity'] += $quantity;
                $product_exists = true;
                break;
            }
        }
        
        if (!$product_exists) {
            $cart_item = array(
                'product_id' => $row['id'],
                'product_name' => $row['product_name'],
                'price' => $row['price'],
                'discount' => $row['discount'],
                'product_image' => $row['product_image'],
                'quantity' => $quantity
            );

            $_SESSION['cart'][] = $cart_item;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
    <link href="css/style6.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/shop.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/cart.css">
    <title>TSL Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
        rel="stylesheet">
</head>

<body>
    <?php require("header.php"); ?>
    <article>
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {?>
        <div class="cart-main">
            <div class="table-responsive-xxl">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stt = 0;
                            $totalPrice = 0;
                            if (isset($_SESSION["cart"])) {
                                foreach ($_SESSION["cart"] as $cart_item){
                                    $priceNew = $cart_item['price'] - ($cart_item['price'] * ($cart_item['discount'] / 100));
                                    $price = $cart_item['discount'] > 0 ? $priceNew : $cart_item['price'];
                                    $total = $price * $cart_item['quantity'];
                                    $priceF = number_format($price,0,',','.');
                                    $totalF = number_format($total,0,',','.');
                                    $totalPrice += $total;
                                    $stt++;
                        ?>
                        <tr>
                            <th scope="row"><?=$stt?></th>
                            <td>
                                <div class="td-flex">
                                    <img style="width:100px; height:100px; object-fit: cover;" src="<?=$cart_item['product_image']?>" alt="">
                                    <div>
                                        <h4><?=$cart_item['product_name']?></h4>
                                        <span><?=$priceF?></span>
                                    </div>
                                </div>
                            </td>
                            <td><?=$cart_item['quantity']?></td>
                            <th><?=$totalF?></th>
                            <td><a class="text-dark" href="./removeCart.php?id=<?=$cart_item['product_id']?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Thanh toán</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Sản phẩm
                                <span><?=number_format($totalPrice, 0, ',', '.')?> VNĐ</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Tiền ship
                                <span>Free</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Tổng tiền</strong>
                                </div>
                                <span><strong><?=number_format($totalPrice, 0, ',', '.')?> VNĐ</strong></span>
                            </li>
                        </ul>
                        <?php 
                        if(isset($_SESSION['user_id'])){
                        ?>
                        <a class="btn btn-primary btn-lg btn-block" href="./pay.php">Thanh toán</a>\
                        <?php }else { ?>
                        <a href="./login.php" class="btn btn-primary btn-lg btn-block" onclick="login(event)">
                            Thanh toán
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
        <div class="cart-empty">
            <div class="icon-cart">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <p>Không có sản phẩm nào trong giỏ hàng</p>
            <div class="return-home">
                <a href="./index.php">Quay về trang chủ</a>
            </div>
        </div>
        <?php } ?>
    </article>
    <script>
        function login(event) {
            event.preventDefault();

            const deleteLink = event.currentTarget; // sử dụng this để lấy phần tử được kích hoạt
            const path = deleteLink.getAttribute('href');

            Swal.fire({
                title: "Bạn chưa đăng nhập",
                text: "Vui lòng đăng nhập để thanh toán!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Hủy bỏ",
                confirmButtonText: "Đăng nhập"
            }).then((result) => {
                if (result.value) {
                    document.location.href = path;
                }
            });
        }
    </script>
    <?php require("footer.php"); ?>
</body>

</html>