<header>
    <div class="banner-top container-fluid" id="home">
        <!-- header -->
        <div class="row">
            <div class="col-md-3 top-info text-left mt-lg-4">

                <ul>
                    <li>
                        <i class="fas fa-phone"></i> Hotline:
                    </li>
                    <li class="number-phone mt-3">12345678099</li>
                </ul>
            </div>
            <div class="col-md-6 logo-w3layouts text-center">
                <h1 class="logo-w3layouts">
                    <a class="navbar-brand" href="index.html">
                        GOGLES </a>
                </h1>
            </div>

            <div class="col-md-3 top-info-cart text-right mt-lg-4">
                <ul class="cart-inner-info">
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="button-log">
                            <div class="btn-open">
                                <?= $_SESSION['name'] ?>
                            </div>
                            <div class="open-item">
                                <a class="dropdown-item" href="./order.php">
                                    Đơn hàng
                                </a>
                                <a class="dropdown-item" href="./user.php">
                                    Tài khoản
                                </a>
                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
                                    <a class="dropdown-item" href="./admin/index.php">
                                        Admin
                                    </a>
                                <?php } ?>
                                <a class="dropdown-item" href="./logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="button-log">
                            <a class="btn-open" href="login.php">
                                <span class="fa fa-user" aria-hidden="true"></span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="galssescart galssescart2 cart cart box_1">
                        <a href="./cart.php" class="cart btn btn-outline-info top_googles_cart ">
                            Giỏ hàng
                            <i class="fas fa-cart-arrow-down"></i>
                            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){ ?>
                            <span class="count-cart"><?=count($_SESSION['cart'])?></span>
                            <?php } ?>
                        </a>
                    </li>
                </ul>
                <!---->

                <!---->
            </div>
        </div>

    </div>
    <label class="top-log mx-auto"></label>
    <nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

        <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">

            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-mega mx-auto">
                <li class="nav-item active">
                    <a class="nav-link ml-lg-0" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Về chúng tôi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Danh mục
                    </a>
                    <ul class="dropdown-menu mega-menu ">
                        <li>
                            <div class="row">
                                <div class="col-md-4 media-list span4 text-left">
                                    <h5 class="tittle-w3layouts-sub"> Sản phẩm </h5>
                                    <ul>
                                        <?php 
                                        $result = mysqli_query($conn, "SELECT * FROM categories");
                                        while ($row = mysqli_fetch_array($result)){
                                        ?>
                                        <li class="media-mini mt-3">
                                            <a href="./shop.php?category_id=<?=$row['id']?>"><?=$row['category_name']?></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="col-md-4 media-list span4 text-left">
                                    <h5 class="tittle-w3layouts-sub"> </h5>
                                    <div class="media-mini mt-3">
                                        <a href="shop.php">
                                            <img src="images/g2.jpg" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 media-list span4 text-left">
                                    <h5 class="tittle-w3layouts-sub"></h5>
                                    <div class="media-mini mt-3">
                                        <a href="shop.php">
                                            <img src="images/g3.jpg" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Cửa hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Liên hệ</a>
                </li>
            </ul>

        </div>
    </nav>
</header>