<?php 
	require('db_connect.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM subcategories WHERE id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	header("location:subcategory_list.php");
 ?>