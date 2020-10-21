<?php 
    require('backend_header.php');
    require('db_connect.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM subcategories WHERE id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $cid = $row['category_id'];
 ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Subcategory Edit Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="subcategory_list.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="subcategory_update.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $row['id'] ?>">

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_id" name="name" value="<?= $row['name']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label"> Category </label>
                            <div class="col-sm-10">
                                <select class="custom-select" id="category_id" name="category">
                                    <option selected hidden>Choose Category</option>
                                    <?php 
                                        $cate = "SELECT * FROM categories";
                                        $stmt1 = $conn->prepare($cate);
                                        $stmt1->execute();

                                        $rows = $stmt1->fetchAll();
                                        foreach ($rows as $row) {
                                            $id1 = $row['id'];
                                            $name1 = $row['name'];
                                            ?>

                                            <option <?php if($cid == $id1) echo "selected"; ?> value="<?= $id1 ?>"><?= $name1 ?></option>;
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