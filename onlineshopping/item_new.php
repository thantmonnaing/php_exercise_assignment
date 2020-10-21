<?php 
	require('backend_header.php');
    require('db_connect.php');
?>

<main class="app-content">
 	<div class="app-title">
 		<div>
 			<h1> <i class="icofont-list"></i> Item Form </h1>
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
 					<form action="item_add.php" method="POST" enctype="multipart/form-data">
 						<div class="form-group row">
 							<label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
 							<div class="col-sm-10">
 								<input type="file" id="photo_id" name="photo">
 							</div>
 						</div>

 						<div class="form-group row">
 							<label for="name_id" class="col-sm-2 col-form-label"> Name </label>
 							<div class="col-sm-10">
 								<input type="text" class="form-control" id="name_id" name="name">
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
                                        <input type="text" class="form-control" id="price_id" name="price">
                                    </div>
                                    <div class="tab-pane fade" id="discount" role="tab-panel" aria-labelledby="discount_tab">
                                        <input type="text" class="form-control" id="discount_id" name="discount">
                                    </div>
                                </div>
                            </div>
 						</div>						

 						<div class="form-group row">
 							<label for="desc_id" class="col-sm-2 col-form-label"> Description </label>
 							<div class="col-sm-10">
 								<textarea id="desc_id" name="description" class="form-control" rows="2"></textarea>
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

                                            <option value=<?= $id1 ?>><?= $name1 ?></option>;
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
                                        $stmt1 = $conn->prepare($cate);
                                        $stmt1->execute();

                                        $rows = $stmt1->fetchAll();
                                        foreach ($rows as $row) {
                                            $id1 = $row['id'];
                                            $name1 = $row['name'];
                                            ?>

                                            <option value=<?= $id1 ?>><?= $name1 ?></option>;
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