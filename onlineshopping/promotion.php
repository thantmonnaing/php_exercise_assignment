<?php 
	ob_start();

	require('frontend_header.php');

	if (!isset($_SESSION['login_user'])){
      	header("Location: login.php");
      	exit();
    }
    
	require('db_connect.php');
	
?>

<div class="jumbotron jumbotron-fluid subtitle">
	<div class="container">
		<h1 class="text-center text-white"> Promotion Item </h1>
	</div>
</div>

<div class="container mt-5">
	<div class="row mt-5">
		<div class="col">
			<div class="bbb_viewed_title_container">
				<h3 class="bbb_viewed_title"> Discount  </h3>
				<div class="bbb_viewed_nav_container">
					<div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
					<div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
				</div>
			</div>
			<div class="bbb_viewed_slider_container">
				<div class="owl-carousel owl-theme bbb_viewed_slider">
					<?php 
						$sql = "SELECT items.* FROM items 
						WHERE items.discount != ''";
						$stmt = $conn->prepare($sql);
						$stmt->execute();

						$rows = $stmt->fetchAll();
						foreach ($rows as $row) {
							$id = $row['id'];
							$codeno = $row['codeno'];
							$name = $row['name'];
							$photo = $row['photo'];
							$price = $row['price'];
							$discount = $row['discount'];

					?>
					<div class="owl-item">
						<div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center" style="padding-left: 0px;padding-right:0px;">
							<div class="pad15">
								<a href="itemdetail.php?id=<?= $id ?>" class="text-decoration-none text-dark">
									<img src="<?= $photo ?>" class="img-fluid" style="width: 160px;">
									<p class="text-truncate" style="width: 160px;"><?= $name ?></p>
									<p class="item-price">
										<?php if($discount) {?>
			                        	<strike> <?= $price ?> Ks </strike> 
			                        	<span class="d-block"> <?= $discount ?> Ks</span>
				                        <?php } else{ ?>
				                        	<span class="d-block"> <?= $price ?> Ks</span>
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

								<button class="btn btn-outline-secondary add_to_card" data-id="<?= $name ?>" data-codeno ="<?= $codeno ?>" data-photo="<?= $photo ?>" data-name="<?= $name ?>" data-price="<?= $price ?>" data-discount="<?= $discount ?>"><i class="icofont-shopping-cart mr-2"></i>Add to Cart</button>
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