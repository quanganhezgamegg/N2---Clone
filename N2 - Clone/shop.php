<?php
require "./config/connectDB.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link rel="stylesheet" href="./css/header.css">
	<title>TSL Shop</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
	<?php
		require("header.php");
	?>
	<!-- banner -->
	<div class="banner_inner">
		<div class="services-breadcrumb">
			<div class="inner_breadcrumb">

				<ul class="short">
					<li>
						<a href="index.php">Trang chủ</a>
						<i>|</i>
					</li>
					<li>Cửa hàng</li>
				</ul>
			</div>
		</div>
	</div>
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">
			<div class="inner-sec-shop px-lg-4 px-3">
				<?php 
				if (isset($_GET['category_id'])) {
					$id = $_GET['category_id'];
					$result = mysqli_query($conn, "SELECT * FROM categories WHERE id = $id");
					$row = mysqli_fetch_assoc($result);
				?>
					<h3 class="tittle-w3layouts my-lg-4 mt-3"><?=$row['category_name']?></h3>
				<?php }else { ?>
					<h3 class="tittle-w3layouts my-lg-4 mt-3">Tất cả các sản phẩm</h3>
				<?php } ?>
				<div class="row">
					<!-- product left -->
					<div class="side-bar col-lg-3">
						<div class="search-hotel">
							<h3 class="agileits-sear-head">Tìm kiếm...</h3>
							<form action="" method="POST">
								<input class="form-control" type="search" name="search" placeholder="Search here..." required="">
								<button name="submit" class="btn1">
									<i class="fas fa-search"></i>
								</button>
								<div class="clearfix"> </div>
							</form>
						</div>
						<!-- discounts -->
						<div class="left-side">
							<h3 class="agileits-sear-head">Discount</h3>
							<form action="" method="POST">
								<ul>
									<li>
										<input value="0" name="discount" type="radio" class="checked">
										<span class="span">0% </span>
									</li>
									<li>
										<input value="20" name="discount" type="radio" class="checked">
										<span class="span">0% - 20% </span>
									</li>
									<li>
										<input value="40" name="discount" type="radio" class="checked">
										<span class="span">20% - 40% </span>
									</li>
									<li>
										<input value="60" name="discount" type="radio" class="checked">
										<span class="span">40% - 60% </span>
									</li>
									<li>
										<input value="80" name="discount" type="radio" class="checked">
										<span class="span">60% - 80% </span>
									</li>
									<li>
										<input value="100" name="discount" type="radio" class="checked">
										<span class="span">80% - 100% </span>
									</li>
								</ul>
								<button name="filter" class="btn btn-success"><i class="fa-solid fa-filter"></i> Lọc</button>
							</form>
						</div>
						<!-- //discounts -->

						<!-- deals -->
						<div class="deal-leftmk left-side">
							<h3 class="agileits-sear-head"> Deals</h3>
							<div class="special-sec1">
								<div class="img-deals">
									<img src="images/s1.jpg" alt="">
								</div>
								<div class="img-deal1">
									<h3> Kính nữ Farenheit </h3>
									<a href="single.php">575.000 VNĐ</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="special-sec1">
								<div class="col-xs-4 img-deals">
									<img src="images/s2.jpg" alt="">
								</div>
								<div class="col-xs-8 img-deal1">
									<h3>Kính Opium (Grey)</h3>
									<a href="single.php">690.000 VNĐ</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="special-sec1">
								<div class="col-xs-4 img-deals">
									<img src="images/m2.jpg" alt="">
								</div>
								<div class="col-xs-8 img-deal1">
									<h3>Kính Azmani Round</h3>
									<a href="single.php">725.000 VNĐ</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="special-sec1">
								<div class="col-xs-4 img-deals">
									<img src="images/m4.jpg" alt="">
								</div>
								<div class="col-xs-8 img-deal1">
									<h3>Kính Farenheit Oval</h3>
									<a href="single.php">500.000 VNĐ</a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<!-- //deals -->
					</div>
					<!-- //product left -->
					<!--/product right-->
					<div class="left-ads-display col-lg-9">
						<div class="row">
							<!-- /womens -->
							<?php 
								if (isset($_GET['category_id'])) {
									$id = $_GET['category_id'];
									$sql = "SELECT P.*, C.*, P.id AS product_id FROM products AS P INNER JOiN categories AS C ON P.category_id = C.id WHERE P.category_id = $id";

									if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
										if (isset($_POST['submit'])) {
											$data = $_POST['search'];
											$sql .= " AND P.product_name LIKE '%$data%' OR C.category_name LIKE '%$data%'";
						
										}

										if (isset($_POST['discount'])) {
											$discount = $_POST['discount'];
											switch ($discount) {
												case 0:
													$sql .= " AND P.discount = 0";
													break;
												case 20: 
													$sql .= " AND P.discount < 20 AND P.discount > 0";
													break;
												case 40: 
													$sql .= " AND P.discount < 40 AND P.discount > 20";
													break;
												case 60: 
													$sql .= " AND P.discount < 60 AND P.discount > 40";
													break;
												case 80: 
													$sql .= " AND P.discount < 80 AND P.discount > 60";
													break;
												case 100: 
													$sql .= " AND P.discount <= 100 AND P.discount > 80";
													break;
											}
										}
									}

									$result = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_array($result)) {
										$priceOldF = number_format($row['price'], 0, ',', '.');
										$priceNew = $row['price'] - ($row['price'] * $row['discount'] / 100);
										$priceNewF = number_format($priceNew, 0, ',', '.'); 
							?>
							<div class="col-md-3 product-men women_two shop-gd">
								<div class="product-googles-info googles">
									<div class="men-pro-item">
										<div class="men-thumb-item">
											<img src="<?=$row['product_image']?>" class="img-fluid" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="./single.php?product_id=<?=$row['product_id']?>" class="link-product-add-cart">Xem ngay</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
										</div>
										<div class="item-info-product">
											<div class="info-product-price">
												<div class="grid_meta">
													<div class="product_price">
														<h4>
															<a href="./single.php?product_id=<?=$row['product_id']?>"><?=$row['product_name']?></a>
														</h4>
														<?php if ($row['discount'] > 0) { ?>
														<div class="grid-price mt-2">
															<div class="price-old">
																<del><?=$priceOldF?> VNĐ</del>
																<span><?=$row['discount']?>%</span>
															</div>
															<span class="money "><?=$priceNewF?> VNĐ</span>
														</div>
														<?php } else { ?>
														<div class="grid-price mt-2">
															<span class="money "><?=$priceOldF?> VNĐ</span>
														</div>
														<?php } ?>
													</div>
													<ul class="stars">
														<li>
															<a href="#">
																<i class="fa fa-star" aria-hidden="true"></i>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-star" aria-hidden="true"></i>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-star" aria-hidden="true"></i>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-star" aria-hidden="true"></i>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-star-half-o" aria-hidden="true"></i>
															</a>
														</li>
													</ul>
												</div>
												<div class="googles single-item hvr-outline-out">
													<form action="./cart.php" method="post">
														<input type="hidden" name="product_id" value="<?=$row['product_id']?>">
														<button class="googles-cart pgoogles-cart">
															<i class="fas fa-cart-plus"></i>
														</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php 
									}else { 

									$sql = "SELECT P.*, C.*, P.id AS product_id FROM products AS P INNER JOiN categories AS C ON P.category_id = C.id WHERE 1";

									if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
										if (isset($_POST['submit'])) {
											$data = $_POST['search'];
											$sql .= " AND P.product_name LIKE '%$data%' OR C.category_name LIKE '%$data%'";
										}

										if (isset($_POST['discount'])) {
											$discount = $_POST['discount'];
											switch ($discount) {
												case 0:
													$sql .= " AND P.discount = 0";
													break;
												case 20: 
													$sql .= " AND P.discount < 20 AND P.discount > 0";
													break;
												case 40: 
													$sql .= " AND P.discount < 40 AND P.discount > 20";
													break;
												case 60: 
													$sql .= " AND P.discount < 60 AND P.discount > 40";
													break;
												case 80: 
													$sql .= " AND P.discount < 80 AND P.discount > 60";
													break;
												case 100: 
													$sql .= " AND P.discount <= 100 AND P.discount > 80";
													break;
											}
										}
									}

									$result = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_array($result)) {
										$priceOldF = number_format($row['price'], 0, ',', '.');
										$priceNew = $row['price'] - ($row['price'] * $row['discount'] / 100);
										$priceNewF = number_format($priceNew, 0, ',', '.'); 
							?>
							<div class="col-md-3 product-men women_two shop-gd">
								<div class="product-googles-info googles">
									<div class="men-pro-item">
										<div class="men-thumb-item">
											<img src="<?=$row['product_image']?>" class="img-fluid" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="./single.php?product_id=<?=$row['product_id']?>" class="link-product-add-cart">Xem ngay</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
										</div>
										<div class="item-info-product">
											<div class="info-product-price">
												<div class="grid_meta">
													<div class="product_price">
														<h4>
															<a href="./single.php?product_id=<?=$row['product_id']?>"><?=$row['product_name']?></a>
														</h4>
														<?php if ($row['discount'] > 0) { ?>
														<div class="grid-price mt-2">
															<div class="price-old">
																<del><?=$priceOldF?> VNĐ</del>
																<span><?=$row['discount']?>%</span>
															</div>
															<span class="money "><?=$priceNewF?> VNĐ</span>
														</div>
														<?php } else { ?>
														<div class="grid-price mt-2">
															<span class="money "><?=$priceOldF?> VNĐ</span>
														</div>
														<?php } ?>
													</div>
													<ul class="stars">
														<li>
															<a href="#">
																<i class="fa fa-star" aria-hidden="true"></i>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-star" aria-hidden="true"></i>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-star" aria-hidden="true"></i>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-star" aria-hidden="true"></i>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-star-half-o" aria-hidden="true"></i>
															</a>
														</li>
													</ul>
												</div>
												<div class="googles single-item hvr-outline-out">
													<form action="./cart.php" method="post">
														<input type="hidden" name="product_id" value="<?=$row['product_id']?>">
														<button type="submit" class="googles-cart pgoogles-cart">
															<i class="fas fa-cart-plus"></i>
														</button>
													</form>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
							<?php } } ?>
						</div>
					</div>
				</div>
				<!--//product right-->
			</div>
			<!--/slide-->
		</div>
	</section>
	<?php require("footer.php"); ?>		
</body>

</html>