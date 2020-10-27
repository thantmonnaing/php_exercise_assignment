<?php 
	ob_start();

	require('frontend_header.php');

	if (!isset($_SESSION['login_user'])){
      	header("Location: login.php");
      	exit();
    }
	require('db_connect.php');

	$item_id = $_GET['id'];

	$sql = "SELECT items.*,brands.name as bname,subcategories.name as sname, categories.name as cname FROM items 
	INNER JOIN brands
	ON items.brand_id = brands.id
	INNER JOIN subcategories
	ON items.subcategory_id = subcategories.id
	INNER JOIN categories
	ON subcategories.category_id = categories.id
	WHERE items.id = :value1";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $item_id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> <?= $row['codeno'] ?> </h1>
  		</div>
	</div>

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

		<div class="row m-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<img src="<?= $row['photo'] ?>" class="img-fluid">
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
				
				<h4> <?= $row['name'] ?> </h4>

				<div class="star-rating">
					<ul class="list-inline">
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
					</ul>
				</div>

				<p>
					<h4> <?= $row['description'] ?></h4>
				</p>

				<p> 
					<?php if($row['discount']) {?>
						<span class="text-uppercase "> Current Price : </span>
						<span class="maincolor ml-3 font-weight-bolder">  <?= $row['price'] ?> Ks </span><br>
						<span class="text-uppercase "> Discount : </span>
						<span class="maincolor ml-3 font-weight-bolder"> <del> <?= $row['discount'] ?> Ks</del></span>
					<?php } else{ ?>
						<span class="text-uppercase "> Current Price : </span>
						<span class="maincolor ml-3 font-weight-bolder">  <?= $row['price'] ?> Ks </span>
					<?php } ?>					

				</p>

				<p> 
					<span class="text-uppercase "> Brand : </span>
					<span class="ml-3"> <a href="" class="text-decoration-none text-muted"> <?= $row['bname'] ?> </a> </span>
				</p>

					<button class="btn btn-outline-secondary add_to_card" data-id="<?= $row['id'] ?>" data-codeno ="<?= $row['codeno'] ?>" data-photo="<?= $$row['photo'] ?>" data-name="<?= $row['name'] ?>" data-price="<?= $row['price'] ?>" data-discount="<?= $row['discont'] ?>"><i class="icofont-shopping-cart mr-2"></i>Add to Cart</button>
				
			</div>
		</div>

<?php 
	require('frontend_footer.php');
?>