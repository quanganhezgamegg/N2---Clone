<div class="banner">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div class="carousel-caption text-center">
					<h3>Kính mắt Nam
						<span>Giáng sinh giảm ngay 50%</span>
					</h3>
					<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Mua sắm ngay</a>
				</div>
			</div>
			<div class="carousel-item item2">
				<div class="carousel-caption text-center">
					<h3>Kính mắt Nữ
						<span>Bộ sưu tập hấp dẫn</span>
					</h3>
					<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Mua sắm ngay</a>

				</div>
			</div>
			<div class="carousel-item item3">
				<div class="carousel-caption text-center">
					<h3>Kính mắt Nam
						<span>Giáng sinh giảm ngay 50%</span>
					</h3>
					<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Mua sắm ngay</a>

				</div>
			</div>
			<div class="carousel-item item4">
				<div class="carousel-caption text-center">
					<h3>Kính mắt Nữ
						<span>Bộ sưu tập hấp dẫn</span>
					</h3>
					<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Mua sắm ngay</a>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<!--//banner-sec-->
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
	<div class="container-fluid">
		<div class="inner-sec-shop px-lg-4 px-3">
			<h3 class="tittle-w3layouts my-lg-4 my-4">Hàng mới về </h3>
			<div class="row">
				<?php 
				$sql = "SELECT * FROM products ORDER BY create_date DESC LIMIT 4";
				$result = mysqli_query($conn, $sql);	
				while ($row = mysqli_fetch_assoc($result)) {
					$priceOldF = number_format($row['price'], 0, ',', '.');
					$priceNew = $row['price'] - ($row['price'] * $row['discount'] / 100);
					$priceNewF = number_format($priceNew, 0, ',', '.'); 
				?>
				<div class="col-md-3 product-men women_two">
					<div class="product-googles-info googles">
						<div class="men-pro-item">
							<div class="men-thumb-item">
								<img src="<?=$row['product_image']?>" class="img-fluid" alt="">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="./single.php?product_id=<?=$row['id']?>" class="link-product-add-cart">Xem ngay</a>
									</div>
								</div>
								<span class="product-new-top">New</span>
							</div>
							<div class="item-info-product">
								<div class="info-product-price">
									<div class="grid_meta">
										<div class="product_price">
											<h4>
												<a href="./single.php?product_id=<?=$row['id']?>"><?=$row['product_name']?></a>
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

										</ul>
									</div>
									<div class="googles single-item hvr-outline-out">
										<form action="./cart.php" method="post">
											<input type="hidden" name="product_id" value="<?=$row['id']?>">
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
				<?php } ?>
			</div>
			<!-- //womens -->
		</div>
	</div>
</section>
<!--jQuery-->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- newsletter modal -->
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center p-5 mx-auto mw-100">
				<h6>Join our newsletter and get</h6>
				<h3>50% Off for your first Pair of Eye wear</h3>
				<div class="login newsletter">
					<form action="#" method="post">
						<div class="form-group">
							<label class="mb-2">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail2"
								aria-describedby="emailHelp" placeholder="" required="">
						</div>
						<button type="submit" class="btn btn-primary submit mb-4">Get 50% Off</button>
					</form>
					<p class="text-center">
						<a href="#">No thanks I want to pay full Price</a>
					</p>
				</div>
			</div>

		</div>
	</div>
</div>
</body>

</html>