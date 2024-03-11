<?php
session_start();
include "src/Database/connect.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // view the product
    $selectproducts = "select * from product where product_id='$id'";
    $result = mysqli_query($conn, $selectproducts);
    $product = mysqli_fetch_assoc($result);
    // echo json_encode($product);

    $user_id = $_SESSION['user_id'];
    $product_id = $product['product_id'];
    $product_name = $product['title'];
    $product_price = $product['price'];
    $product_image = $product['image'];

    $product_quantity = 1;
    $product_total = $product_price * $product_quantity;

    $productexists = "SELECT * FROM cart WHERE product_id='$id' AND user_id='$user_id'";
    $result_in_cart = mysqli_query($conn, $productexists);
    $product_in_cart = mysqli_fetch_all($result_in_cart , MYSQLI_ASSOC);

    if ($product_in_cart['cart_status'] == "deleted") {
        $status_query = "UPDATE cart SET cart_status='incart'  WHERE product_id='$id' AND user_id='$user_id'";
        $result = mysqli_query($conn, $status_query);
        if ($result) {
            $insert_query = "INSERT INTO notification(notification_id, buyer_id , seller_id , admin_id , product_id , order_id , cart_id , message , notification_date , notification_status) VALUES (NULL, '$user_id', '$seller_id', NULL, '$product_id', NULL, NULL, 'added to cart', CURRENT_TIMESTAMP, 'unread')";
            $result = mysqli_query($conn, $insert_query);
            echo "<script> alert('added to card sucessfully'); </script>";
            header('location: /cart');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    if ($product_in_cart != null && $product_in_cart['cart_status'] == "incart") {
        $product_quantity = $product_in_cart['product_quantity'] + 1;
        $product_total = $product_price * $product_quantity;
        $sql = "UPDATE cart SET product_quantity='$product_quantity', product_total='$product_total' WHERE product_id='$id' AND user_id='$user_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('added to card sucessfully'); </script>";
            $insert_query = "INSERT INTO notification(notification_id, buyer_id , seller_id , admin_id , product_id , order_id , cart_id , message , notification_date , notification_status) VALUES (NULL, '$user_id', '$seller_id', NULL, '$product_id', NULL, NULL, 'added to cart', CURRENT_TIMESTAMP, 'unread')";
            $result = mysqli_query($conn, $insert_query);
            // post the message in the notification data base
            header('location: /cart');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } 
        
    else {
        $sql = "INSERT INTO cart (cart_id,user_id, product_id, product_name, 
        product_price, product_image, product_quantity, product_total,cart_status)
                 VALUES (NULL,'$user_id', '$product_id', '$product_name', 
                 '$product_price', '$product_image', '$product_quantity', '$product_total','incart')";
        if ($conn->query($sql) === TRUE) {
            // header('location: /cart');
            // post name of product and image in the notification data base
            $insert_query = "INSERT INTO notification(notification_id, buyer_id , seller_id , admin_id , product_id , order_id , cart_id , message , notification_date , notification_status) VALUES (NULL, '$user_id', NULL , NULL, '$product_id', NULL, NULL, 'added to cart', CURRENT_TIMESTAMP, 'unread')";
            $result = mysqli_query($conn, $insert_query);
            echo "<script> alert('added to card sucessfully'); </script>";

            header('location: /cart');
        } else {
            echo "Error:" . mysqli_error($conn);
        }
    }
}
