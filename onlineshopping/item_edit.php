<?php 
	require('backend_header.php');
    require('db_connect.php');

     $id = $_GET['id'];

    $sql = "SELECT * FROM items WHERE id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $sid = $row['subcategory_id'];
    $bid = $row['brand_id'];
?>

<main class="app-content">
 	<div class="app-title">
 		<div>
 			<h1> <i class="icofont-list"></i> Item Edit Form </h1>
 		</div>
 		<ul class="app-breadcrumb breadcrumb side">
 			<a href="item_list.php" class="btn btn-outline-primary">
 				<i class="icofont-double-left"></i>
 			</a>
 		</ul>
 	</div>
 	<div class="row">
 		<div class="col-md-12">
 			<div class="tile">
 				<div class="tile-body">
 					<form action="item_update.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="oldphoto" value="<?= $row['photo'] ?>">

 						<div class="form-group row">
 							<label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
 							<div class="col-9 col-sm-9 col-md-10 col-lg-10">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a href="#oldphoto" class="nav-link active" id="oldphoto_tab" data-toggle="tab" role="tab" aria-controls="oldphoto" aria-selected="true">Old photo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#newphoto" class="nav-link" id="newphoto_tab" data-toggle="tab" role="tab" aria-controls="newphoto" aria-selected="false">New photo</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="oldphoto" role="tab-panel" aria-labelledby="oldphoto_tab">
                                        <img src="<?= $row['photo']?>" width="100px" height="70px" id="add_image" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="newphoto" role="tab-panel" aria-labelledby="newphoto_tab">
                                        <input type="file" id="add_newphoto" name="add_newphoto">
                                    </div>
                                </div>
                            </div>
 						</div>

 						<div class="form-group row">
 							<label for="name_id" class="col-sm-2 col-form-label"> Name </label>
 							<div class="col-sm-10">
 								<input type="text" class="form-control" id="name_id" name="name" value="<?= $row['name']?>">
 							</div>
 						</div>

 						<!-- price -->
 						<div class="form-group row">
 							<label for="price_id" class="col-sm-2 col-form-label"> Price </label>
 							<div class="col-sm-10">
 								<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#price" role="tab" aria-controls="price" aria-selected="true" data-toggle="tab" id="price_tab">Unit Price</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#discount" role="tab" aria-controls="discount" aria-selected="false" data-toggle="tab" id="discount_tab">Discount</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="price" role="tab-panel" aria-labelledby="price_tab">
                                        <input type="text" class="form-control" id="price_id" name="price" value="<?= $row['price']?>">
                                    </div>
                                    <div class="tab-pane fade" id="discount" role="tab-panel" aria-labelledby="discount_tab">
                                        <input type="text" class="form-control" id="discount_id" name="discount" value="<?= $row['discount']?>">
                                    </div>
                                </div>
                            </div>
 						</div>						

 						<div class="form-group row">
 							<label for="desc_id" class="col-sm-2 col-form-label"> Description </label>
 							<div class="col-sm-10">
 								<textarea id="desc_id" name="description" class="form-control" rows="2"><?= $row['description']?></textarea>
 							</div>
 						</div>

 						<div class="form-group row">
                            <label for="brand_id" class="col-sm-2 col-form-label"> Brand </label>
                            <div class="col-sm-10">
                                <select class="custom-select" id="brand_id" name="brand">
                                    <option selected hidden>Choose Brand</option>
                                    <?php 
                                        $brand = "SELECT * FROM brands";
                                        $stmt1 = $conn->prepare($brand);
                                        $stmt1->execute();

                                        $rows = $stmt1->fetchAll();
                                        foreach ($rows as $row) {
                                            $id1 = $row['id'];
                                            $name1 = $row['name'];
                                            ?>

                                            <option <?php if($bid == $id1) echo "selected"; ?> value=<?= $id1 ?>><?= $name1 ?></option>;
                                        <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subcategory_id" class="col-sm-2 col-form-label"> Subcategory </label>
                            <div class="col-sm-10">
                                <select class="custom-select" id="subcategory_id" name="subcategory">
                                    <option selected hidden>Choose Subcategory</option>
                                    <?php 
                                        $cate = "SELECT * FROM subcategories";
                                        $stmt2 = $conn->prepare($cate);
                                        $stmt2->execute();

                                        $rows = $stmt2->fetchAll();
                                        foreach ($rows as $row) {
                                            $id2 = $row['id'];
                                            $name2 = $row['name'];
                                            ?>

                                            <option  <?php if($sid == $id2) echo "selected"; ?> value=<?= $id2 ?>><?= $name2 ?></option>;
                                        <?php } ?>
                                </select>
                            </div>
                        </div> 						

 						<div class="form-group row">
 							<div class="col-sm-10">
 								<button type="submit" class="btn btn-primary">
 									<i class="icofont-save"></i>
 									Save
 								</button>
 							</div>
 						</div>

 					</form>
 				</div>
 			</div>
 		</div>
 	</div>
</main>

<?php 
	require('backend_footer.php');
?>