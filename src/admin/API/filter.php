<?php
    // api for filter
    include('src/Database/database.php');
    // $db = new Database();
    // $conn = $db->getConnection();
    $product_type = $_GET['product_type'];
    $query = "SELECT * FROM product WHERE product_type = '$product_type'";
    $result = mysqli_query($conn, $query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $price = array();
    foreach ($products as $product) {
        array_push($price, $product['price']);
    }
    $price = array_unique($price);
    sort($price);
    $price = array_chunk($price, 2);
    foreach ($price as $p) {
        echo "<input type='checkbox' name='price[]' value='$p[0]-$p[1]'>$p[0]-$p[1]<br>";
    }

    



?>