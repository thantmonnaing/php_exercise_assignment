<?php 
    
    require('db_connect.php');

    $name = $_POST['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    echo "$price<br>";
    echo "$discount";
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $subcategory = $_POST['subcategory'];
    $photo = $_FILES['photo'];

    $source_dir = 'images/item/';

    $codeno = 'OP-'.mt_rand(100000, 999999);

    $filename = mt_rand(100000, 999999);
    $file_exe_array = explode('.', $photo['name']);
    $file_exe = $file_exe_array[1];

    $fullpath = $source_dir.$filename.'.'.$file_exe;
    move_uploaded_file($photo['tmp_name'], $fullpath);
    

    $sql = "INSERT INTO items (codeno, name, photo, price, discount, description, brand_id, subcategory_id) VALUES(:value1, :value2, :value3, :value4, :value5, :value6, :value7, :value8)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1', $codeno);
    $stmt->bindParam(':value2', $name);
    $stmt->bindParam(':value3', $fullpath);
    $stmt->bindParam(':value4', $price);
    $stmt->bindParam(':value5', $discount);
    $stmt->bindParam(':value6', $description);
    $stmt->bindParam(':value7', $brand);
    $stmt->bindParam(':value8', $subcategory);
    $stmt->execute();

    header('location:item_list.php');

?>