<?php 
	require('frontend_header.php');
	require('db_connect.php');
?>

<!-- Carousel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		</ol>
  		
  		<div class="carousel-inner">
    		<div class="carousel-item active">
		      	<img src="frontend/image/banner/ac.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="frontend/image/banner/giordano.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="frontend/image/banner/garnier.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
  		</div>
	</div>

	<div class="container mt-5 px-5">
		<!-- Category -->
		<div class="row">
			<?php 

				$sql = "SELECT * FROM categories ORDER BY rand() LIMIT 8";
				$stmt = $conn->prepare($sql);
				$stmt->execute();



				$rows = $stmt->fetchAll();
				foreach ($rows as $row) {
				$id = $row['id'];
				$name = $row['name'];
				$logo = $row['logo'];


			?>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
				<div class="card categoryCard border-0 shadow-sm p-3 mb-5 rounded text-center" >
				  	<img src="<?= $logo ?>" class="card-img-top " alt="..." style="height: 150px;">
				  	<div class="card-body">
				    	<p class="card-text font-weight-bold text-truncate"><?= $name ?></p>
				  	</div>
				</div>
			</div>
			<?php } ?>
		</div>

		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
		
		<!-- Discount Item -->
		<div class="row mt-5">
			<h1> Discount Item </h1>
		</div>

	    <!-- Disocunt Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php 

		            		$sql = 'SELECT * FROM items WHERE discount != "" LIMIT 8';
		            		$stmt = $conn->prepare($sql);
		            		$stmt->execute();

		            		$discount_items = $stmt->fetchAll();

		            		foreach($discount_items as $discount_item){
		            			$dis_id = $discount_item['id'];
		            			$dis_codeno = $discount_item['codeno'];
		            			$dis_name = $discount_item['name'];
		            			$dis_price = $discount_item['price'];
		            			$dis_discount = $discount_item['discount'];
		            			$dis_photo = $discount_item['photo'];
		            	?>
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $dis_photo ?>" class="img-fluid">
		                        <p class="text-truncate"><?= $dis_name ?></p>
		                        <p class="item-price">
			                        <strike> <?= $dis_price ?> Ks </strike> 
			                        <span class="d-block"> <?= $dis_discount ?> Ks</span>
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

								<button class="btn btn-outline-secondary add_to_card" data-id="<?= $dis_id ?>" data-codeno ="<?= $dis_codeno ?>"
									data-photo="<?= $dis_photo ?>" data-name="<?= $dis_name ?>" data-price="<?= $dis_price ?>" data-discount="<?= $dis_discount ?>">Add to Cart</button>

		                    </div>
		                </div>	
		                <?php } ?>	                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Flash Sale Item -->
		<div class="row mt-5">
			<h1> Flash Sale </h1>
		</div>

	    <!-- Flash Sale Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php 

		            		$sql = 'SELECT * FROM items ORDER BY created_at DESC LIMIT 8';
		            		$stmt = $conn->prepare($sql);
		            		$stmt->execute();

		            		$sales_items = $stmt->fetchAll();

		            		foreach($sales_items as $sales_item){
		            			$s_id = $sales_item['id'];
		            			$s_codeno = $sales_item['codeno'];
		            			$s_name = $sales_item['name'];
		            			$s_price = $sales_item['price'];
		            			$s_discount = $sales_item['discount'];
		            			$s_photo = $sales_item['photo'];
		            	?>
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $s_photo ?>" class="img-fluid">
		                        <p class="text-truncate"><?= $s_name ?></p>
		                        <p class="item-price">
		                        	<?php if($s_discount) {?>
			                        	<strike> <?= $s_price ?> Ks </strike> 
			                        	<span class="d-block"> <?= $s_discount ?> Ks</span>
			                        <?php } else{ ?>
			                        	<span class="d-block"> <?= $s_price ?> Ks</span>
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

								<button class="btn btn-outline-secondary add_to_card" data-id="<?= $s_id ?>" data-codeno ="<?= $s_codeno ?>"
									data-photo="<?= $s_photo ?>" data-name="<?= $s_name ?>" data-price="<?= $s_price ?>" data-discount="<?= $s_discount ?>">Add to Cart</button>
		                    </div>
		                </div>
		            	<?php } ?>
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Random Catgory ~ Item -->
		<div class="row mt-5">
			<h1> Popular Bags</h1>
		</div>

	    <!-- Random Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">		            	
		            	<?php 
		            		$sid = 15;
		            		$sql = 'SELECT * FROM items WHERE subcategory_id = :value1 LIMIT 8';
		            		$stmt = $conn->prepare($sql);
		            		$stmt->bindParam(':value1',$sid);
		            		$stmt->execute();

		            		$p_items = $stmt->fetchAll();

		            		foreach($p_items as $p_item){
		            			$p_id = $p_item['id'];
		            			$p_codeno = $p_item['codeno'];
		            			$p_name = $p_item['name'];
		            			$p_price = $p_item['price'];
		            			$p_discount = $p_item['discount'];
		            			$p_photo = $p_item['photo'];
		            	?>
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $p_photo ?>" class="img-fluid">
		                        <p class="text-truncate"><?= $p_name ?></p>
		                        <p class="item-price">
		                        	<?php if($p_discount) {?>
			                        	<strike> <?= $p_price ?> Ks </strike> 
			                        	<span class="d-block"> <?= $p_discount ?> Ks</span>
			                        <?php } else{ ?>
			                        	<span class="d-block"> <?= $p_price ?> Ks</span>
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

								<button class="btn btn-outline-secondary add_to_card" data-id="<?= $p_id ?>" data-codeno ="<?= $p_codeno ?>"
									data-photo="<?= $p_photo ?>" data-name="<?= $p_name ?>" data-price="<?= $p_price ?>" data-discount="<?= $p_discount ?>">Add to Cart</button>
		                    </div>
		                </div>	
		                <?php } ?>	                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>
		
		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	    <!-- Brand Store -->
	    <div class="row mt-5">
			<h1> Top Brand Stores </h1>
	    </div>

	    <!-- Brand Store Item -->
	    <section class="customer-logos slider mt-5">
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
		    		<div class="slide">
		    			<a href="">
		    				<img src="<?= $b_logo ?>" class="img-fluid">
		    			</a>
		    		</div>
	    	<?php } ?>
	   	</section>

	    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	</div>

	

<?php 
	require('frontend_footer.php');
?>
