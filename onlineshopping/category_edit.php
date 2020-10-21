<?php 
	require('backend_header.php');
	require('db_connect.php');

	$id = $_GET['id'];

	$sql = "SELECT * FROM categories WHERE id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<main class="app-content">
 	<div class="app-title">
 		<div>
 			<h1> <i class="icofont-list"></i> Category Edit Form </h1>
 		</div>
 		<ul class="app-breadcrumb breadcrumb side">
 			<a href="category_list.php" class="btn btn-outline-primary">
 				<i class="icofont-double-left"></i>
 			</a>
 		</ul>
 	</div>
 	<div class="row">
 		<div class="col-md-12">
 			<div class="tile">
 				<div class="tile-body">
 					<form action="category_update.php" method="POST" enctype="multipart/form-data">

 						<input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="oldphoto" value="<?= $row['logo'] ?>">

 						<div class="form-group row">
 							<label for="name_id" class="col-sm-2 col-form-label"> Name </label>
 							<div class="col-sm-10">
 								<input type="text" class="form-control" id="name_id" name="name" value="<?= $row['name']?>">
 							</div>
 						</div>

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
 										<img src="<?= $row['logo']?>" width="100px" height="70px" id="add_image" class="img-fluid">
 									</div>
 									<div class="tab-pane fade" id="newphoto" role="tab-panel" aria-labelledby="newphoto_tab">
 										<input type="file" id="add_newphoto" name="add_newphoto">
 									</div>
 								</div>
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