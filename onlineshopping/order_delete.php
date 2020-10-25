<?php 
    require('db_connect.php');

    $id = $_GET['id'];
	$sql = "UPDATE orders SET status ='Delete' WHERE id='$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	header("location:order_list.php");
?>