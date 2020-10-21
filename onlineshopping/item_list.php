<?php 
	require('backend_header.php');
    require('db_connect.php');
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Item </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="item_new.php" class="btn btn-outline-primary">
                <i class="icofont-plus"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = "SELECT i.*,s.name AS subcategory, b.name AS brand FROM items AS i INNER JOIN subcategories AS s ON s.id = i.subcategory_id INNER JOIN brands AS b ON b.id = i.brand_id";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    $rows = $stmt->fetchAll();

                                    // var_dump($rows);
                                    $i = 1;
                                    foreach ($rows as $row) {
                                        $id = $row['id'];
                                        $codeno = $row['codeno'];
                                        $name = $row['name'];
                                        $photo = $row['photo'];
                                        $subcategory = $row['subcategory'];
                                        $price = $row['price'];
                                        $discount = $row['discount'];
                                        $brand = $row['brand'];
                                    
                                ?>

                                <tr>
                                    <td> <?php echo $i++ ?>. </td>
                                    <td> 
                                        <div style="float: left;" class="pr-3">
                                            <img src="<?= $photo ?>" class="img-fluid" id="item_image">
                                        </div>
                                        <div>
                                            <h5><?= $codeno ?></h5>
                                            <p><?= $name ?></p>
                                        </div>
                                    </td>
                                    <td> <?= $brand ?> </td>
                                    <td> 
                                        <p><?= $price ?> MMK</p>
                                        <p><del><?= $discount; if($discount > 0) echo "MMK"; ?> </del></p>
                                    </td>
                                    <td>
                                       <a href="item_edit.php?id=<?= $id ?>" class="btn btn-warning">
                                            <i class="icofont-ui-settings"></i>
                                        </a>

                                        <a href="item_delete.php?id=<?= $id ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want delete?')">
                                            <i class="icofont-close"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
	require('backend_footer.php');
?>