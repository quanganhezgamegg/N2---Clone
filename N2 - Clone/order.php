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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
        rel="stylesheet">
</head>

<body>
    <?php require "header.php" ?>
    <article>
        <?php
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            ?>
            <h3>Kiểm tra đơn hàng</h3>
            <ul class="tabs">
                <li class="tab active" onclick="changeTab(0)">Chờ xác nhận</li>
                <li class="tab" onclick="changeTab(1)">Đã xác nhận</li>
                <li class="tab" onclick="changeTab(2)">Chuẩn bị đơn hàng</li>
                <li class="tab" onclick="changeTab(3)">Đang vận chuyển</li>
                <li class="tab" onclick="changeTab(4)">Đã giao hàng</li>
                <li class="tab" onclick="changeTab(5)">Đã hủy</li>
            </ul>

            <!-- Nội dung cho tab "Chờ xác nhận" -->
            <div id="tabContent0" class="tab-content active">
                <div>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM orders WHERE order_status='Chờ xác nhận' AND user_id = $user_id ORDER BY order_date DESC");
                    if (mysqli_num_rows($result)) {
                        while ($list = mysqli_fetch_assoc($result)) {
                            $totalF = number_format($list['total_amount'], 0, ',', '.');
                            ?>
                            <div class="order">
                                <h3>Đơn hàng #DH000<?=$list['id'] ?></h3>
                                <p><strong>Trạng thái:</strong>
                                    <?= $list['order_status'] ?>
                                </p>
                                <p><strong>Ngày xuất hóa đơn:</strong>
                                    <?= $list['order_date'] ?>
                                </p>
                                <p><strong>Tổng tiền:</strong>
                                    <?= $totalF ?><sup>đ</sup>
                                </p>
                                <p><strong>Trạng thái đơn hàng:</strong> <?=$list['order_status']?></p>
                                <div class="btn-event">
                                    <a class="btn btn-outline-success"
                                        href="./order-detail.php?order_id=<?= $list['id'] ?>">Xem chi tiết đơn hàng</a>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="no-order">
                            <img src="./images/5fafbb923393b712b96488590b8f781f.png" alt="">
                            <p>Chưa có đơn hàng!</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Nội dung cho tab "Đã xác nhận" -->
            <div id="tabContent1" class="tab-content">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM orders WHERE order_status='Đã xác nhận' AND user_id = $user_id ORDER BY order_date DESC");
                if (mysqli_num_rows($result)) {
                    while ($list = mysqli_fetch_assoc($result)) {
                        $totalF = number_format($list['total_amount'], 0, ',', '.');
                        ?>
                        <div class="order">
                            <h3>Đơn hàng #DH000<?=$list['id'] ?></h3>
                            <p><strong>Trạng thái:</strong>
                                <?= $list['order_status'] ?>
                            </p>
                            <p><strong>Ngày xuất hóa đơn:</strong>
                                <?= $list['order_date'] ?>
                            </p>
                            <p><strong>Tổng tiền:</strong>
                                <?= $totalF ?><sup>đ</sup>
                            </p>
                            <p><strong>Trạng thái đơn hàng:</strong> <?=$list['order_status']?></p>
                            <div class="btn-event">
                                <a class="btn btn-outline-success"
                                    href="./order-detail.php?order_id=<?= $list['id'] ?>">Xem chi tiết đơn hàng</a>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="no-order">
                        <img src="./images/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                <?php } ?>
            </div>

            <!-- Nội dung cho tab "Chuẩn bị đon hàng" -->
            <div id="tabContent2" class="tab-content">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM orders WHERE order_status='Chuẩn bị đơn hàng' AND user_id = $user_id ORDER BY order_date DESC");
                if (mysqli_num_rows($result)) {
                    while ($list = mysqli_fetch_assoc($result)) {
                        $totalF = number_format($list['total_amount'], 0, ',', '.');
                        ?>
                        <div class="order">
                            <h3>Đơn hàng #DH000<?=$list['id'] ?></h3>
                            <p><strong>Trạng thái:</strong>
                                <?= $list['order_status'] ?>
                            </p>
                            <p><strong>Ngày xuất hóa đơn:</strong>
                                <?= $list['order_date'] ?>
                            </p>
                            <p><strong>Tổng tiền:</strong>
                                <?= $totalF ?><sup>đ</sup>
                            </p>
                            <p><strong>Trạng thái đơn hàng:</strong> <?=$list['order_status']?></p>
                            <div class="btn-event">
                                <a class="btn btn-outline-success"
                                    href="./order-detail.php?order_id=<?= $list['id'] ?>">Xem chi tiết đơn hàng</a>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="no-order">
                        <img src="./images/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                <?php } ?>
            </div>

            <!-- Nội dung cho tab "Đang vận chuyển" -->
            <div id="tabContent3" class="tab-content">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM orders WHERE order_status='Đang vận chuyển' AND user_id = $user_id ORDER BY order_date DESC");
                if (mysqli_num_rows($result)) {
                    while ($list = mysqli_fetch_assoc($result)) {
                        $totalF = number_format($list['total_amount'], 0, ',', '.');
                        ?>
                        <div class="order">
                            <h3>Đơn hàng #DH000<?=$list['id'] ?></h3>
                            <p><strong>Trạng thái:</strong>
                                <?= $list['order_status'] ?>
                            </p>
                            <p><strong>Ngày xuất hóa đơn:</strong>
                                <?= $list['order_date'] ?>
                            </p>
                            <p><strong>Tổng tiền:</strong>
                                <?= $totalF ?><sup>đ</sup>
                            </p>
                            <p><strong>Trạng thái đơn hàng:</strong> <?=$list['order_status']?></p>
                            <div class="btn-event">
                                <a class="btn btn-outline-success"
                                    href="./order-detail.php?order_id=<?= $list['id'] ?>">Xem chi tiết đơn hàng</a>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="no-order">
                        <img src="./images/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                <?php } ?>
            </div>

            <!-- Nội dung cho tab "Đã giao hàng" -->
            <div id="tabContent4" class="tab-content">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM orders WHERE order_status='Hoàn tất đơn hàng' OR order_status = 'Đã giao hàng' AND user_id = $user_id ORDER BY order_date DESC");
                if (mysqli_num_rows($result)) {
                    while ($list = mysqli_fetch_assoc($result)) {
                        $totalF = number_format($list['total_amount'], 0, ',', '.');
                        ?>
                        <div class="order">
                            <?php if ($list['order_status'] == 'Hoàn tất đơn hàng'){ ?>
                            <div class="success-order"><i class="fa-solid fa-car-side"></i> &nbsp;Giao hàng thành công</div>
                            <?php } ?>
                            <h3>Đơn hàng #DH000<?=$list['id'] ?></h3>
                            <p><strong>Trạng thái:</strong>
                                <?= $list['order_status'] ?>
                            </p>
                            <p><strong>Ngày xuất hóa đơn:</strong>
                                <?= $list['order_date'] ?>
                            </p>
                            <p><strong>Tổng tiền:</strong>
                                <?= $totalF ?><sup>đ</sup>
                            </p>
                            <p><strong>Trạng thái đơn hàng:</strong> <?=$list['order_status']?></p>
                            <div class="btn-event">
                                <a class="btn btn-outline-success"
                                    href="./order-detail.php?order_id=<?= $list['id'] ?>">Xem chi tiết đơn hàng</a>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="no-order">
                        <img src="./images/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                <?php } ?>
            </div>
            <!-- Nội dung cho tab "Đã hủy" -->
            <div id="tabContent5" class="tab-content">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM orders WHERE order_status='Hủy đơn hàng' AND user_id = $user_id ORDER BY order_date DESC");
                if (mysqli_num_rows($result)) {
                    while ($list = mysqli_fetch_assoc($result)) {
                        $totalF = number_format($list['total_amount'], 0, ',', '.');
                        ?>
                        <div class="order">
                            <h3>Đơn hàng #DH000<?=$list['id'] ?></h3>
                            <p><strong>Trạng thái:</strong>
                                <?= $list['order_status'] ?>
                            </p>
                            <p><strong>Ngày xuất hóa đơn:</strong>
                                <?= $list['order_date'] ?>
                            </p>
                            <p><strong>Tổng tiền:</strong>
                                <?= $totalF ?><sup>đ</sup>
                            </p>
                            <p><strong>Trạng thái đơn hàng:</strong> <?=$list['order_status']?></p>
                            <div class="btn-event">
                                <a class="btn btn-outline-success"
                                    href="./order-detail.php?order_id=<?= $list['id'] ?>">Xem chi tiết đơn hàng</a>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="no-order">
                        <img src="./images/5fafbb923393b712b96488590b8f781f.png" alt="">
                        <p>Chưa có đơn hàng!</p>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </article>
    <script>
        function changeTab(tabIndex) {
            document.querySelectorAll('.tab-content').forEach(function (content) {
                content.classList.remove('active');
            });

            document.getElementById(`tabContent${tabIndex}`).classList.add('active');


            document.querySelectorAll('.tab').forEach(function (tab) {
                tab.classList.remove('active');
            });


            document.querySelector(`.tab:nth-child(${tabIndex + 1})`).classList.add('active');
        }


    </script>
    <?php require "footer.php" ?>
</body>

</html>