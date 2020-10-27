<?php 
		
	require ("db_connect.php");
	
	$orderid = $_POST['id'];

	$sql = "SELECT * FROM orderdetails AS details
    		INNER JOIN items
    		ON details.item_id = items.id
    		WHERE details.order_id = :value1";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1',$orderid);
    $stmt->execute();
    $orderdetails = $stmt->fetchAll();

	echo json_encode($orderdetails);


?>