<?php 
    require('db_connect.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

	<title> Shopules </title>

	<!-- Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">

    <!-- iconfont CSS -->
    <link rel="stylesheet" type="text/css" href="icon/icofont/icofont.min.css">
	<!-- Boxicon CSS -->
    <link rel="stylesheet" type="text/css" href="icon/boxicons-master/css/boxicons.min.css">
    
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="frontend/css/font.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/style.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/media_query.css">
    
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" type="text/css" href="frontend/css/bootstrap.min.css">

    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" type="text/css" href="frontend/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/owl.theme.default.css">

</head>
<body>

	<!-- Navigation-->
	<div class="container-fluid">

		<div class="row shadow-sm p-3 bg-white rounded d-flex align-items-center">
			<!-- LOGO -->
			<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 order-1">
				<span class="d-xl-none d-lg-none d-md-inline d-sm-inline d-inline  p-1 navslidemenu">
					<i class="icofont-navigation-menu"></i>
				</span>
				<img src="logo/logo_big.jpg" class="img-fluid d-xl-inline d-lg-inline d-md-none d-sm-none d-none">

				<img src="logo/logo_med.jpg" class="img-fluid d-xl-none d-lg-none d-md-inline d-sm-none d-none" style="width: 100px">

				<img src="logo/logo.jpg" class="img-fluid d-xl-none d-lg-none d-md-none d-sm-inline d-inline pl-2" style="width: 30px">
			</div>
			
			<!-- Search Bar -->
			<div class="col-xl-6 col-lg-6 col-md-4 col-sm-2 col-2 order-xl-2 order-lg-2 order-md-3 order-sm-3 order-3">
				<div class="row">
					<div class="col-lg-8 col-2 ">
						<div class="has-search d-xl-block d-lg-block d-none ">
						    <div class="input-group">
				                <input class="form-control pl-4 border-right-0 border" type="search" placeholder="Search" id="">
				                <span class="input-group-append searchBtn">
				                    <div class="input-group-text bg-transparent">
				                    	<i class="icofont-search"></i>
				                    </div>
				                </span>
				            </div>
						</div>
					</div>
					<div class="col-lg-4 col-10">
						<a href="login.php" class="d-xl-block d-lg-block d-md-block d-none  text-decoration-none loginLink float-right"> Login | Sign-up </a>

						
					</div>
				</div>
			</div>
			
			<!-- Shopping-cart -->
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 order-xl-3 order-lg-3 order-md-4 order-sm-4 order-4 text-right">
				<!-- Search ICON shopping cart -->

				<div class="d-xl-none d-lg-none d-md-none d-sm-inline d-inline searchiconBtn mr-2">
					<i class="icofont-search"></i>
				</div>

				<a href="cart.php" class="text-decoration-none d-xl-inline d-lg-inline d-md-inline d-sm-none d-none shoppingcartLink"> 
					<i class="icofont-shopping-cart"></i> 
					<span class="badge badge-pill badge-light badge-notify cartNotistyle cartNoti" id="cart"> 1 </span>
					<span id="total"> 4,800 Ks </span>
				</a>

				<a href="" class="text-decoration-none d-xl-none d-lg-none d-md-none d-sm-inline-block d-inline-block shoppingcartLink"> 
					<i class="icofont-shopping-cart"></i>
					<span class="badge badge-pill badge-light badge-notify cartNotistyle cartNoti"> 1 </span>
				</a>

				<!-- App Download -->

				<img src="frontend/image/download.png" class="img-fluid d-xl-inline d-lg-inline d-md-none d-sm-none d-none" style="width: 150px">
			</div>
		</div>
	</div>
	<div id="myPage"></div>
	
	<!-- Sub Nav (Web) -->
	<div class="container subNav d-xl-block d-lg-block d-none my-3">
		<div class="row align-items-center">
			<div class="col-3 align-items-center">
				<p class="d-inline pr-3"> Shop By </p>

				<div class="dropdown d-inline-block">
          			<a class="nav-link text-decoration-none text-dark font-weight-bold d-block" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          	<span class="mr-2"> Category </span>
						<i class="icofont-rounded-down pt-2"></i>

			        </a>			        
			        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			        	<?php 

							$sql = "SELECT * FROM categories";
							$stmt = $conn->prepare($sql);
							$stmt->execute();



							$rows = $stmt->fetchAll();
							foreach ($rows as $row) {
							$id = $row['id'];
							$name = $row['name'];


						?>
			          	<li class="dropdown-submenu">
			          		<a class="dropdown-item" href="javascript:void(0)">
			          			<?= $name ?>
			          			<i class="icofont-rounded-right float-right"></i>
			          		</a>
				            <ul class="dropdown-menu">
				            	<h6 class="dropdown-header">
				            		<?= $name ?>
				            	</h6>
				            	<?php 

									$sql = "SELECT * FROM subcategories WHERE category_id = '$id'";
									$stmt = $conn->prepare($sql);
									$stmt->execute();

									$rows = $stmt->fetchAll();
									foreach ($rows as $row) {
									$sid = $row['id'];
									$sname = $row['name'];

								?>
				              	<li><a class="dropdown-item" href="#"><?= $sname ?></a></li>

				              	<?php } ?>
				              
				            </ul>
			          	</li>
			          	<div class="dropdown-divider"></div>
			          	<?php } ?>			          	
			        </ul>
        		</div>
			</div>

			<div class="col-3">
				<a href="" class="text-decoration-none text-dark font-weight-bold"> Promotion </a>
			</div>
			<div class="col-3">
				<div class="hov-dropdown d-inline-block">
          			<a class="text-decoration-none text-dark font-weight-bold" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          				<span class="mr-2"> Brands </span>
						<i class="icofont-rounded-down pt-2"></i>

          			</a>
          			<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
          				<?php 

					    	$sql = 'SELECT * FROM brands';
					    	$stmt = $conn->prepare($sql);
					    	$stmt->execute();

					    	$brand_items = $stmt->fetchAll();

					    	foreach($brand_items as $brand_item){
					    		$b_id = $brand_item['id'];
					    		$b_name = $brand_item['name'];
					    		$b_logo = $brand_item['logo'];

			    		?>
	            			<a class="dropdown-item" href="#"><?= $b_name ?></a>
	            			<div class="dropdown-divider"></div>
            			<?php } ?>
          			</div>
        		</div>
			</div>

			<div class="col-3">
				<div class="hov-dropdown d-inline-block">
          			<a class="text-decoration-none text-dark font-weight-bold" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          				<span class="mr-2"> Services </span>
						<i class="icofont-rounded-down pt-2"></i>

          			</a>
          			<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            			<a class="dropdown-item" href="#">
            				Help Center
            			</a>
            			<div class="dropdown-divider"></div>
            			
            			<a class="dropdown-item" href="#">
            				Order
            			</a>
            			<div class="dropdown-divider"></div>
            			
            			<a class="dropdown-item" href="#">
            				Shipping & Delivery
            			</a>
            			<div class="dropdown-divider"></div>

            			<a class="dropdown-item" href="#">
            				Payment
            			</a>
            			<div class="dropdown-divider"></div>

            			<a class="dropdown-item" href="#">
            				Returns & Refunds
            			</a>

          			</div>
        		</div>
			</div>
		</div>
	</div>

	<!-- Sub Nav (Mobile) -->
	<div id="mySidebar" class="sidebar">
		<div class="row">
			<div class="col-10">
	  			<img src="logo/logo_med_trans.png" class="img-fluid" style="width: 100px">
			</div>
			<div class="col-2">
				<a href="javascript:void(0)" class="closebtn text-decoration-none">
			  		<i class="icofont-close-line"></i>
			  	</a>
			</div>
		</div>
		
		<div class="mt-3">
			<p class="text-muted ml-4"> Shop By </p>
			<hr>
			
			<?php 

				$sql = "SELECT * FROM categories";
				$stmt = $conn->prepare($sql);
				$stmt->execute();

				$rows = $stmt->fetchAll();
				foreach ($rows as $row) {
				$id = $row['id'];
				$name = $row['name'];

			?>

			  	<a data-toggle="collapse" href="#category_<?= $id ?>" role="button" aria-expanded="false" aria-controls="category">
			   		<?= $name ?>
			   		<i class="icofont-rounded-down float-right mr-3"></i>
			  	</a>

				<div class="collapse sidebardropdown_container_category mt-3" id="category_<?= $id ?>">
					<?php 

						$sql = "SELECT * FROM subcategories WHERE category_id = '$id'";
						$stmt = $conn->prepare($sql);
						$stmt->execute();

						$sub_rows = $stmt->fetchAll();
						foreach ($sub_rows as $sub_row) {
						$sid = $sub_row['id'];
						$sname = $sub_row['name'];

					?>
				    	<a href="" class="py-2 text-white"> <?= $sname; ?> </a>
				    <?php } ?> 
				</div>
				<hr>
			<?php } ?>


		  	<a href="#"> Poromotion </a>
			<hr>

		  	<a data-toggle="collapse" href="#brand" role="button" aria-expanded="false" aria-controls="brand">
		   		Brands
		   		<i class="icofont-rounded-down float-right mr-3"></i>

		  	</a>

		  	<div class="collapse sidebardropdown_container_category mt-3" id="brand">
		  		<?php 

			  		$sql = 'SELECT * FROM brands';
			  		$stmt = $conn->prepare($sql);
			  		$stmt->execute();

			  		$brand_items = $stmt->fetchAll();

			  		foreach($brand_items as $brand_item){
			  			$b_id = $brand_item['id'];
			  			$b_name = $brand_item['name'];
			  			$b_logo = $brand_item['logo'];

			  			?>
			  			<a href="" class="py-2 text-white"><?= $b_name ?></a>
		  		<?php } ?>
		  	</div>
			<hr>

			<a data-toggle="collapse" href="#service" role="button" aria-expanded="false" aria-controls="service">
		   		Service
		   		<i class="icofont-rounded-down float-right mr-3"></i>
		  	</a>

			<div class="collapse sidebardropdown_container_category mt-3" id="service">
			    <a href="" class="py-2"> Help Center </a>
			    <a href="" class="py-2"> Order </a>
			    <a href="" class="py-2"> Shipping & Delivery </a>
			    <a href="" class="py-2"> Payment </a>
			    <a href="" class="py-2"> Returns & Refunds </a>
			</div>
			<hr>

			<a href="#"> Login | Signup</a>
			<hr>

			<a href="#"> Cart [ <span class="cartNoti"> 1 </span> ]  </a>
			<hr>

			<img src="image/download.png" class="img-fluid ml-2 text-center" style="width: 150px">
			<hr>

			<p class="text-white ml-3"> Copyright &copy; <img src="../logo/logo_wh_transparent.png" style="width: 20px; height: 20px"> 2019  </p>

		</div>
	  	
	</div>