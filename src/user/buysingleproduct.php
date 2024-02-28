



<?php
session_start();
require 'src/Database/connect.php';
// get user id
$user_id = $_SESSION['user_id'];


if(isset($_GET['id'])){
    //  insert in order table 
    $product_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $getseller = "SELECT user_id FROM product WHERE product_id='$product_id'";

    $result = mysqli_query($conn, $getseller);
    $row = mysqli_fetch_assoc($result);
    $seller_id = $row['user_id'];

    // insert in table order
    $sql = "INSERT INTO orders (order_id, user_id, seller_id, product_id, cart_id , order_date, order_status)
     VALUES (NULL, '$user_id', '$seller_id', '$product_id', NULL , CURRENT_TIMESTAMP, 'on process')";
    $result = mysqli_query($conn, $sql);
    if($result){
        // header("Location: ");        
    }else{
        echo "order not inserted";
    }





}




?>
