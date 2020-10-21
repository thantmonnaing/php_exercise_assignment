<?php 
	require('db_connect.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM brands WHERE id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	header("location:brand_list.php");
 ?>