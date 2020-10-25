<?php 
	require('backend_header.php');
    require('db_connect.php');
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> User </h1>
        </div>
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
                                    <th>Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = "SELECT users.* FROM users
                                    INNER JOIN model_has_roles
                                    ON users.id = model_has_roles.user_id
                                    INNER JOIN roles
                                    ON roles.id = model_has_roles.role_id
                                    WHERE roles.name = 'Customer'";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    $rows = $stmt->fetchAll();
                                    $i = 1;
                                    foreach ($rows as $row) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $profile = $row['profile'];
                                        $phone = $row['phone'];
                                        $address = $row['address'];
                                    
                                ?>
                                <tr>
                                    <td> <?= $i++ ?> </td>
                                    <td> <?= $name ?> </td>
                                    <td> <?= $phone ?> <br> <?= $address ?> </td>
                                    <td>
                                        <a href="user_delete.php?id=<?= $id ?>" class="btn btn-outline-danger">
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