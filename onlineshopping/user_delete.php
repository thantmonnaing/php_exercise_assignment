<?php 
    require('db_connect.php');

    $id = $_GET['id'];

	$sql = "DELETE FROM users WHERE id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$sql = "DELETE FROM model_has_roles WHERE user_id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header("location:user_list.php");
?>