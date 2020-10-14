<?php 

	$name = $_POST["edit_name"];
	$email = $_POST["edit_email"];
	$gender = $_POST["edit_gender"];
	$address = $_POST["edit_address"];

	$id = $_POST["edit_id"];
	$oldprofile = $_POST["edit_oldprofile"];
	$newprofile = $_FILES["edit_newprofile"];

	var_dump($oldprofile);
	echo "<br>";
	var_dump($newprofile);

	if($newprofile['size'] > 0){
		$basepath = 'photo/';
		$fullpath = $basepath.$newprofile['name'];
		move_uploaded_file($newprofile['tmp_name'], $fullpath);
	}else{
		$fullpath = $oldprofile;
	}

	$student = array(
		'name' => $name,
		'email' => $email,
		'gender' =>$gender,
		'address' =>$address,
		'profile' =>$fullpath
		 );

	$json_data = file_get_contents('studentlist.json');

	if(!$json_data){
		$json_data = '[]';
	}

	$data_arr = json_decode($json_data,true);

	$data_arr[$id] = $student;

	$json_data = json_encode($data_arr,JSON_PRETTY_PRINT);

	file_put_contents('studentlist.json', $json_data);

	header('location:index.php');

?>