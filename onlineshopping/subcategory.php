<?php 
	require('frontend_header.php');
	require('db_connect.php');

	$sid = $_GET['id'];

	$sql = "SELECT items.*,brands.name as bname,
	subcategories.name as sname, 
	categories.name as cname,categories.id as cid
	FROM items 
	INNER JOIN brands
	ON items.brand_id = brands.id
	INNER JOIN subcategories
	ON items.subcategory_id = subcategories.id
	INNER JOIN categories
	ON subcategories.category_id = categories.id
	WHERE subcategories.id = :value1";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $sid);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	// var_dump($row);
	$cid = $row['cid'];

	
?>

<!-- Subcategory Title -->
<div class="jumbotron jumbotron-fluid subtitle">
	<div class="container">
		<h1 class="text-center text-white"> <?= $row['sname'] ?> </h1>
	</div>
</div>

<!-- Content -->
	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> Category </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> <?= $row['cname'] ?> </a>
		    	</li>
		    	<li class="breadcrumb-item active" aria-current="page">
					<?= $row['sname'] ?>
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<ul class="list-group">
					<?php 

						$sql = "SELECT * FROM subcategories WHERE category_id = '$cid'";
						$stmt = $conn->prepare($sql);
						$stmt->execute();

						$rows = $stmt->fetchAll();
						foreach ($rows as $srow) {
							$s_id = $srow['id'];
							$s_name = $srow['name'];

					?>
						<li class="list-group-item <?php if($s_id == $sid) echo "active" ?>">
							<a href="subcategory.php?id=<?= $s_id ?>" class="text-decoration-none secondarycolor"> <?= $s_name ?> </a>
						</li>
					<?php } ?>
				</ul>
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

				<div class="row">					
					<?php 
						$sql = "SELECT items.* FROM items 
						INNER JOIN subcategories
						ON items.subcategory_id = subcategories.id
						WHERE items.subcategory_id = '$sid'";
						$stmt = $conn->prepare($sql);
						$stmt->execute();

						$rows = $stmt->fetchAll();
						foreach ($rows as $i_row) {
							$i_id = $i_row['id'];
							$i_codeno = $i_row['codeno'];
							$i_name = $i_row['name'];
							$i_photo = $i_row['photo'];
							$i_price = $i_row['price'];
							$i_discount = $i_row['discount'];

					?>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="card pad15 mb-3">
							<a href="itemdetail.php?id=<?= $i_id ?>" class="text-decoration-none text-dark">
						  	<img src="<?= $i_photo ?>" class="img-fluid" alt="...">
						  	
						  	<div class="card-body text-center">
						    	<h5 class="card-title text-truncate"><?= $i_name ?></h5>
						    	
						    	<p class="item-price">
						    		<?php if($i_discount) {?>
			                        	<strike> <?= $i_price ?> Ks </strike> 
			                        	<span class="d-block"> <?= $i_discount ?> Ks</span>
			                        <?php } else{ ?>
			                        	<span class="d-block"> <?= $i_price ?> Ks</span>
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

								<button class="btn btn-outline-secondary add_to_card" data-id="<?= $i_name ?>" data-codeno ="<?= $i_codeno ?>" data-photo="<?= $i_photo ?>" data-name="<?= $i_name ?>" data-price="<?= $i_price ?>" data-discount="<?= $i_discount ?>"><i class="icofont-shopping-cart mr-2"></i>Add to Cart</button>
						  	</div>
						</div>
					</div>
					<?php } ?>
				</div>

				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
					    <li class="page-item disabled">
					      	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="icofont-rounded-left"></i>
					      	</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">1</a>
					    </li>
					    <li class="page-item active">
					    	<a class="page-link" href="#">2</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">3</a>
					    </li>
					    <li class="page-item">
					      	<a class="page-link" href="#">
					      		<i class="icofont-rounded-right"></i>
					      	</a>
					    </li>
					</ul>
				</nav>
			</div>
		</div>		
	</div>

<?php 
	require('frontend_footer.php');
?>