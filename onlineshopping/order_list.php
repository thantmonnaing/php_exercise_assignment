<?php 
	require('backend_header.php');
    require('db_connect.php');
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Order </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true"> Order - Pending </a>
                            <a class="nav-link" id="nav-confirm-tab" data-toggle="tab" href="#nav-confirm" role="tab" aria-controls="nav-confirm" aria-selected="false"> Order - Confirm </a>
                            <a class="nav-link" id="nav-cancel-tab" data-toggle="tab" href="#nav-cancel" role="tab" aria-controls="nav-cancel" aria-selected="false"> Order - Cancel </a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active py-4" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Voucher No</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM orders WHERE status = 'Order' ORDER BY created_at DESC";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();

                                        $rows = $stmt->fetchAll();
                                        $i = 1;
                                        foreach ($rows as $row) {
                                            $id = $row['id'];
                                            $date = $row['orderdate'];
                                            $voucherno = $row['voucherno'];
                                            $total = $row['total'];
                                            $note = $row['note'];
                                            $status = $row['status'];

                                            ?>
                                            <tr>
                                                <td> <?= $i++ ?> </td>
                                                <td> <?= $date ?> </td>
                                                <td> <?= $voucherno ?></td>
                                                <td> <?= $total ?> </td>
                                                <td> <?= $status ?> </td>
                                                <td>
                                                    <a href="order_detail.php?id=<?= $id ?>" class="btn btn-outline-info">
                                                        <i class="icofont-info"></i>
                                                    </a>
                                                    <a href="order_confirm.php?id=<?= $id ?>" class="btn btn-outline-success">
                                                        <i class="icofont-ui-check"></i>
                                                    </a>
                                                    <a href="order_delete.php?id=<?= $id ?>" class="btn btn-outline-danger">
                                                        <i class="icofont-close"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade py-4" id="nav-confirm" role="tabpanel" aria-labelledby="nav-pending-tab">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Voucher No</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM orders WHERE status = 'Confirm' ORDER BY created_at DESC";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();

                                        $rows = $stmt->fetchAll();
                                        $i = 1;
                                        foreach ($rows as $con_row) {
                                            $con_id = $con_row['id'];
                                            $con_date = $con_row['orderdate'];
                                            $con_voucherno = $con_row['voucherno'];
                                            $con_total = $con_row['total'];
                                            $con_note = $con_row['note'];
                                            $con_status = $con_row['status'];

                                            ?>
                                            <tr>
                                                <td> <?= $i++ ?> </td>
                                                <td> <?= $con_date ?> </td>
                                                <td> <?= $con_voucherno ?></td>
                                                <td> <?= $con_total ?> </td>
                                                <td> <?= $con_status ?> </td>
                                                <td>
                                                    <a href="order_detail.php?id=<?= $con_id ?>" class="btn btn-outline-info">
                                                        <i class="icofont-info"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade py-4" id="nav-cancel" role="tabpanel" aria-labelledby="nav-pending-tab">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Voucher No</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM orders WHERE status = 'Delete' ORDER BY created_at DESC";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();

                                        $rows = $stmt->fetchAll();
                                        $i = 1;
                                        foreach ($rows as $del_row) {
                                            $del_id = $del_row['id'];
                                            $del_date = $del_row['orderdate'];
                                            $del_voucherno = $del_row['voucherno'];
                                            $del_total = $del_row['total'];
                                            $del_note = $del_row['note'];
                                            $del_status = $del_row['status'];

                                            ?>
                                            <tr>
                                                <td> <?= $i++ ?> </td>
                                                <td> <?= $del_date ?> </td>
                                                <td> <?= $del_voucherno ?></td>
                                                <td> <?= $del_total ?> </td>
                                                <td> <?= $del_status ?> </td>
                                                <td>
                                                    <a href="order_detail.php?id=<?= $del_id ?>" class="btn btn-outline-info">
                                                        <i class="icofont-info"></i>
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
        </div>
    </div>


</main>

<?php 
	require('backend_footer.php');
?>