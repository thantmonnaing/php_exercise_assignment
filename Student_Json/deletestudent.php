<?php 
	$id = $_POST["id"];

	$json_data = file_get_contents('studentlist.json');

	$data_arr = json_decode($json_data,true);

	unset($data_arr[$id]);

	$json_data = json_encode($data_arr,JSON_PRETTY_PRINT);

	file_put_contents('studentlist.json', $json_data);

	header('location:index.php');
?>