<?php 
	require('backend_header.php');
    require('db_connect.php');
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Brand </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="brand_new.php" class="btn btn-outline-primary">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $sql = "SELECT * FROM brands";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    $rows = $stmt->fetchAll();

                                    // var_dump($rows);
                                    $i = 1;
                                    foreach ($rows as $row) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $logo = $row['logo'];
                                    
                                ?>

                                <tr>
                                    <td> <?php echo $i++ ?>. </td>
                                    <td> <img src="<?= $logo ?>" class="brand_image img-fluid"> <?= $name ?></td>
                                    <td>
                                        <a href="brand_edit.php?id=<?= $id ?>" class="btn btn-warning">
                                            <i class="icofont-ui-settings"></i>
                                        </a>

                                       <a href="brand_delete.php?id=<?= $id ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want delete?')">
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