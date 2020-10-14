<?php 

	$name = $_POST["stu_name"];
	$email = $_POST["stu_email"];
	$gender = $_POST["stu_gender"];
	$address = $_POST["stu_address"];

	$profile = $_FILES["stu_profile"];

	var_dump($profile);

	//upload file
	$basepath = 'photo/';
	$fullpath = $basepath.$profile['name'];
	move_uploaded_file($profile['tmp_name'], $fullpath);

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

	array_push($data_arr, $student);

	$json_data = json_encode($data_arr,JSON_PRETTY_PRINT);

	file_put_contents('studentlist.json', $json_data);

	header('location:index.php');

?>