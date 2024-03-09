<?php
session_start();
include 'src/database/connect.php';
$user_id = $_SESSION['user_id'];

if (isset($_POST['address_id'])) {
    // echo "address id is set";
    $address_id = $_POST['address_id'];
    $product_id = $_POST['product_Id'];

    // //  insert in order table 
    

    // get product id from product
    $getseller = "SELECT user_id FROM product WHERE product_id='$product_id'";

    $result = mysqli_query($conn, $getseller);
    $row = mysqli_fetch_assoc($result);
    $seller_id = $row['user_id'];

    // insert in table order
    $sql = "INSERT INTO orders (order_id, user_id, seller_id, product_id, cart_id, address_id , order_date, order_status)
     VALUES (NULL, '$user_id', '$seller_id', '$product_id', NULL ,'$address_id' ,CURRENT_TIMESTAMP, 'pending')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // get order id 
        $getorder = "SELECT order_id FROM orders WHERE user_id='$user_id' AND product_id='$product_id' AND address_id='$address_id'";
        $result = mysqli_query($conn, $getorder);
        $row = mysqli_fetch_assoc($result);
        $order_id = $row['order_id'];

        // insert into notification table
        $insert_query = "INSERT INTO notification(notification_id, buyer_id , seller_id , admin_id , product_id , order_id , cart_id , message , notification_date , notification_status)
         VALUES (NULL, '$user_id', '$seller_id', NULL, '$product_id', $order_id, NULL, 'order placed', CURRENT_TIMESTAMP, 'unread')";
        $result = mysqli_query($conn, $insert_query);

        echo "order Placed Successfully";
        // header("Location: ");        
    } else {
        echo "order not inserted";
    }
}
