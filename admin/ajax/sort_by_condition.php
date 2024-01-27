<?php

include '../../action/config.php';

if (isset($_POST['sort_by'])) {
	$sort_by = $_POST['sort_by'];
	if($sort_by=='pname_asc'){
		$condition = "ORDER BY product.pname ASC";
	}elseif($sort_by=='pname_desc'){
		$condition = "ORDER BY product.pname DESC";
	}elseif($sort_by=='price_asc'){
		$condition = "ORDER BY size.offer_price ASC";
	}elseif($sort_by=='price_desc'){
		$condition = "ORDER BY size.offer_price DESC";
	}
}
?>

<div class="tab_content">
	<div id="product_grid" class="tab_pane active show">
		<div class="product__section--inner product__section--style3__inner">
			<div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-3 row-cols-2 mb--n30">
				<?php

				$sql = "SELECT product.id AS pid,product.pname,product.cat_id,product.img1,size.id AS size_id, size.size,size.price,size.disc,size.offer_price FROM `size` INNER JOIN product ON product.id = size.pid GROUP BY `pid`" . $condition;

				$qry = mysqli_query($con, $sql);

				while ($pr = mysqli_fetch_array($qry)) :
				?>
					<div class="col mb-30">
						<div class="product__items product__items2">
							<div class="product__items--thumbnail">
								<a class="product__items--link" href="product-details?pid=<?= base64_encode($pr['pid']) ?>&size_id=<?= base64_encode($pr['size_id']) ?>">
									<img class="product__items--img product__primary--img" src="<?= $path2 . $pr['img1'] ?>" alt="product-img">
								</a>
								<div class="product__badge">
									<span class="product__badge--items sale">Sale <?= $pr['disc'] ?>% Off</span>
								</div>
								<form action="" method="post">
									<ul class="product__items--action">

										<input type="hidden" name="userid" value="<?= $userid ?>">
										<input type="hidden" name="pid" value="<?= $pr['pid'] ?>">
										<input type="hidden" name="weight" value="<?= $pr['size_id'] ?>">
										<input type="hidden" name="qty" value="1">

										<li class="product__items--action__list">
											<button type="submit" name="add_to_wishlist" class="product__items--action__btn btn3">
												<i class="far fa-heart"></i>
											</button>
										</li>

										<li class="product__items--action__list">
											<button type="submit" name="add_to_cart" class="product__items--action__btn btn3">
												<i class="fas fa-cart-plus"></i>
											</button>
										</li>
									</ul>
								</form>
							</div>
							<div class=" text-center">
								<a href="product-details?pid=<?= base64_encode($pr['pid']) ?>&size_id=<?= base64_encode($pr['size_id']) ?>"><?= $pr['pname'] ?> &nbsp; <?= $pr['size'] ?></a>
								<div class="product__items--price">
									<span class="current__price"><i class="fas fa-rupee-sign"></i> <?= $pr['offer_price'] ?></span>
									<span class="old__price"><i class="fas fa-rupee-sign"></i> <?= $pr['price'] ?></span>
								</div>

							</div>
						</div>
					</div>

				<?php endwhile; ?>
			</div>
		</div>
	</div>

	<div id="product_list" class="tab_pane">
		<div class="product__section--inner product__section--style3__inner">
			<div class="row row-cols-1 mb--n30">
				<?php

				$sql = "SELECT product.id AS pid,product.pname,product.cat_id,product.img1,size.id AS size_id, size.size,size.price,size.disc,size.offer_price FROM `size` INNER JOIN product ON product.id = size.pid GROUP BY `pid`" . $condition;

				$qry = mysqli_query($con, $sql);

				while ($pr = mysqli_fetch_array($qry)) :
				?>
					<form action="" method="post">
						<div class="col mb-30">
							<div class="product__items product__list--items d-flex">
								<div class="product__items--thumbnail product__list--items__thumbnail">
									<a class="product__items--link" href="product-details?pid=<?= base64_encode($pr['pid']) ?>&size_id=<?= base64_encode($pr['size_id']) ?>">
										<img class="product__items--img product__primary--img" src="<?= $path2 . $pr['img1'] ?>">
									</a>
									<div class="product__badge">
										<span class="product__badge--items sale">Sale <?= $pr['disc'] ?>% Off</span>
									</div>
									<ul class="product__items--action">
										<input type="hidden" name="userid" value="<?= $userid ?>">
										<input type="hidden" name="pid" value="<?= $pr['pid'] ?>">
										<input type="hidden" name="weight" value="<?= $pr['size_id'] ?>">
										<input type="hidden" name="qty" value="1">
										<li class="product__items--action__list">
											<button type="submit" name="add_to_wishlist" class="product__items--action__btn btn3">
												<i class="far fa-heart"></i>
											</button>
										</li>
									</ul>
								</div>
								<div class="product__list--items__content">
									<a href="product-details?pid=<?= base64_encode($pr['pid']) ?>&size_id=<?= base64_encode($pr['size_id']) ?>"><?= $pr['pname'] ?> &nbsp; <?= $pr['size'] ?></a>
									<div class="product__items--price mb-10">
										<span class="current__price"><i class="fas fa-rupee-sign"></i> <?= $pr['offer_price'] ?></span>
										<span class="old__price"><i class="fas fa-rupee-sign"></i> <?= $pr['price'] ?></span>
									</div>

									<button class="btn add__to--cart__btn2" type="submit" name="add_to_cart">+ Add to cart</button>
								</div>
							</div>
						</div>
					</form>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<!-- <div class="pagination__area bg__gray--color">
		<nav class="pagination justify-content-center">
			<ul class="pagination__wrapper d-flex align-items-center justify-content-center">
				<li class="pagination__list">
					<a href="#shopsales_item" class="pagination__item--arrow  link ">
						<svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
							<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
						</svg>
						<span class="visually-hidden">page left arrow</span>
					</a>
				<li>
				<li class="pagination__list"><span class="pagination__item pagination__item--current">1</span></li>
				<li class="pagination__list"><a href="#shopsales_item" class="pagination__item link">2</a></li>
				<li class="pagination__list"><a href="#shopsales_item" class="pagination__item link">3</a></li>
				<li class="pagination__list"><a href="#shopsales_item" class="pagination__item link">4</a></li>
				<li class="pagination__list">
					<a href="#shopsales_item" class="pagination__item--arrow  link ">
						<svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
							<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100" />
						</svg>
						<span class="visually-hidden">page right arrow</span>
					</a>
				<li>
			</ul>
		</nav>
	</div> -->
</div>