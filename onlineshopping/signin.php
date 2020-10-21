<?php 
	require("db_connect.php");

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT users.*, roles.name as rname FROM users 
			INNER JOIN model_has_roles 
			ON users.id = model_has_roles.user_id
			INNER JOIN roles
			ON model_has_roles.role_id = roles.id
			WHERE email = :v1 AND password = :v2";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':v1', $email);
	$stmt->bindParam(':v2', $password);
	$stmt->execute();

	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	var_dump($stmt->rowCount());

	if($stmt->rowCount() <=0){

		//invalid

		if(!isset($_COOKIE['logincount'])){
			$loginCount = 1;
		}
		else{
			$loginCount= $_COOKIE['logincount'];
			$loginCount++;
		}

	}else{

	}
	
	// if($user){
	// 	header('location:category_list.php');	
	// }else{

	// 	header('location:login.php');	
	// }

 ?>	
