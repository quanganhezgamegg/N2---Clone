<?php
require "./config/connectDB.php";
session_start();
if (isset($_GET['product_id'])) {
	$id = $_GET['product_id'];
	mysqli_query($conn, "UPDATE products SET view = view + 1 WHERE id = $id");
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
	<title>TSL Shop</title>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link
		href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
		rel="stylesheet">
</head>

<body>
	<?php
	require "header.php"
		?>
	<div class="banner-top container-fluid" id="home">

		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.php">Home</a>
							<i>|</i>
						</li>
						<li>Chi tiết sản phẩm</li>
					</ul>
				</div>
			</div>

		</div>

	</div>
	<!--//banner -->
	<!--/shop-->
	<?php
	if (isset($_GET['product_id'])) {
		$id = $_GET['product_id'];
		$result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
		$row = mysqli_fetch_assoc($result);
		$priceOldF = number_format($row['price'], 0, ',', '.');
		$priceNew = $row['price'] - ($row['price'] * $row['discount'] / 100);
		$priceNewF = number_format($priceNew, 0, ',', '.');
		?>
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="inner-sec-shop pt-lg-4 pt-3">
					<div class="row">
						<div class="col-lg-4 single-right-left ">
							<div class="grid images_3_of_2">
								<div class="flexslider1">
									<ul class="slides">
										<li data-thumb="images/d2.jpg">
											<div class="thumb-image"> <img src="<?= $row['product_image'] ?>"
													data-imagezoom="true" class="img-fluid" alt=" "> </div>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-8 single-right-left simpleCart_shelfItem">
							<h3>
								<?= $row['product_name'] ?>
							</h3>
							<?php if ($row['discount'] > 0) { ?>
								<p>
									<span class="item_price">
										<?= $priceNewF ?> VNĐ
									</span>
									<del>
										<?= $priceOldF ?> VNĐ
									</del>
									<span>
										<?= $row['discount'] ?>%
									</span>
								</p>
							<?php } else { ?>
								<p>
									<span class="item_price">
										<?= $priceNewF ?> VNĐ
									</span>
								</p>
							<?php } ?>
							<div class="rating1">
								<ul class="stars">
									<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								</ul>
							</div>

							<div class="color-quality">
								<div class="color-quality-right">
									<div class="description">
										<?= $row['description'] ?>
									</div>

								</div>
							</div>

							<?php
							// Xử lý khi người dùng gửi biểu mẫu
							if (isset($_POST['submit'])) {
								$quantity = $_POST['quantity'];
								// Xử lý số lượng
								// Ví dụ: in ra số lượng đã chọn
								echo "Selected quantity: " . $quantity;
							}
							?>

							<div class="occasion-cart">
								<div class="googles single-item singlepage">
									<form action="./cart.php" method="post">
										<input type="hidden" name="product_id" value="<?=$row['id']?>">
										<div class="quantity">
											<button class="decrease" type="button">-</button>
											<input type="number" oninput="validateDiscount(this)" name="quantity" id="quantityInput" min="1" max="" class="count" value="1">
											<button class="increase" type="button">+</button>
										</div>
										<button type="submit" class="googles-cart pgoogles-cart">
											Thêm vào giỏ hàng
										</button>
									</form>
								</div>
							</div>
							<ul class="footer-social text-left mt-lg-4 mt-3">
								<li>Share On : </li>
								<li class="mx-2">
									<a href="#">
										<span class="fab fa-facebook-f"></span>
									</a>
								</li>
								<li class="mx-2">
									<a href="#">
										<span class="fab fa-twitter"></span>
									</a>
								</li>
								<li class="mx-2">
									<a href="#">
										<span class="fab fa-google-plus-g"></span>
									</a>
								</li>
								<li class="mx-2">
									<a href="#">
										<span class="fab fa-linkedin-in"></span>
									</a>
								</li>
								<li class="mx-2">
									<a href="#">
										<span class="fas fa-rss"></span>
									</a>
								</li>

							</ul>

						</div>
						<div class="clearfix"> </div>


					</div>
				</div>
			</div>

			<div class="container-fluid">


			</div>
		</section>
	<?php } ?>

	<script>
		$(document).ready(function() {
			// Lấy giá trị hiện tại
			var currentQuantity = parseInt($('#quantityInput').val());

			// Bắt sự kiện nút giảm
			$('.decrease').on('click', function() {
				if (currentQuantity > 1) {
					currentQuantity--;
					$('#quantityInput').val(currentQuantity);
				}
			});

			// Bắt sự kiện nút tăng
			$('.increase').on('click', function() {
				if (currentQuantity < 10) {
					currentQuantity++;
					$('#quantityInput').val(currentQuantity);
				}
			});
		});
	</script>
	<?php
	require "footer.php"
		?>

</body>

</html>