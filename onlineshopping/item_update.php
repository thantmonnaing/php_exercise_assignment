<?php 
    
    require('db_connect.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $subcategory = $_POST['subcategory'];
    $oldphoto = $_POST['oldphoto'];

    // echo "$price<br>";
    // echo "$discount";

    $newphoto = $_FILES['add_newphoto'];

    if($newphoto['size'] > 0){
        $source_dir = 'images/item/';

        $filename = mt_rand(100000, 999999);
        $file_exe_array = explode('.', $newphoto['name']);
        $file_exe = $file_exe_array[1];

        $fullpath = $source_dir.$filename.'.'.$file_exe;
        move_uploaded_file($newphoto['tmp_name'], $fullpath);
    }else{
        $fullpath = $oldphoto;
    }

    $sql = "UPDATE items SET name = :value2, photo = :value3, price = :value4, discount = :value5, description = :value6, brand_id = :value7, subcategory_id = :value8
    WHERE id = :value9";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value2', $name);
    $stmt->bindParam(':value3', $fullpath);
    $stmt->bindParam(':value4', $price);
    $stmt->bindParam(':value5', $discount);
    $stmt->bindParam(':value6', $description);
    $stmt->bindParam(':value7', $brand);
    $stmt->bindParam(':value8', $subcategory);
    $stmt->bindParam(':value9', $id);
    $stmt->execute();

    header('location:item_list.php');

?>