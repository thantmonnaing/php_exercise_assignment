<?php 
	require('db_connect.php');

	$id = $_POST['id'];
	$sql = "DELETE FROM categories WHERE id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	header("location:category_list.php");
 ?>