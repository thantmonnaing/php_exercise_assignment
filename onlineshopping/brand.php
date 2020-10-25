<?php 
	require('frontend_header.php');
	require('db_connect.php');

	$bid = $_GET['id'];
	$bname = $_GET['name'];
	
?>

<div class="jumbotron jumbotron-fluid subtitle">
	<div class="container">
		<h1 class="text-center text-white"> <?= $bname ?> </h1>
	</div>
</div>

<div class="container mt-5">
	<div class="row mt-5">
		<div class="col">
			<div class="bbb_viewed_title_container">
				<h3 class="bbb_viewed_title"> <?= $bname ?>  </h3>
				<div class="bbb_viewed_nav_container">
					<div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
					<div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
				</div>
			</div>
			<div class="bbb_viewed_slider_container">
				<div class="owl-carousel owl-theme bbb_viewed_slider">
					<?php 
						$sql = "SELECT items.* FROM items 
						INNER JOIN brands
						ON items.brand_id = brands.id
						WHERE items.brand_id = '$bid'";
						$stmt = $conn->prepare($sql);
						$stmt->execute();

						$rows = $stmt->fetchAll();
						foreach ($rows as $b_row) {
							$b_id = $b_row['id'];
							$b_codeno = $b_row['codeno'];
							$b_name = $b_row['name'];
							$b_photo = $b_row['photo'];
							$b_price = $b_row['price'];
							$b_discount = $b_row['discount'];

					?>
					<div class="owl-item">
						<div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center" style="padding-left: 0px;padding-right:0px;">
							<div class="pad15">
								<a href="itemdetail.php?id=<?= $b_id ?>" class="text-decoration-none text-dark">
									<img src="<?= $b_photo ?>" class="img-fluid" style="width: 160px;">
									<p class="text-truncate" style="width: 160px;"><?= $b_name ?></p>
									<p class="item-price">
										<?php if($b_discount) { ?>
							    			<span class="maincolor ml-3 font-weight-bolder">  <?= $b_price ?> Ks </span><br>
							    			<span class="maincolor ml-3 font-weight-bolder"> <del> <?= $b_discount ?> Ks</del></span>
							    		<?php } else{ ?>
							    			<span class="maincolor ml-3 font-weight-bolder"> <?= $b_price ?> Ks </span>
							    		<?php } ?>
									</p>

									<div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
										</ul>
									</div>
								</a>

								<button class="btn btn-outline-secondary add_to_card" data-id="<?= $b_name ?>" data-codeno ="<?= $b_codeno ?>" data-photo="<?= $b_photo ?>" data-name="<?= $b_name ?>" data-price="<?= $b_price ?>" data-discount="<?= $b_discount ?>"><i class="icofont-shopping-cart mr-2"></i>Add to Cart</button>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

</div>


<?php 
	require('frontend_footer.php');
?>