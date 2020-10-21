<?php 
	require('db_connect.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM items WHERE id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	header("location:item_list.php");
 ?>