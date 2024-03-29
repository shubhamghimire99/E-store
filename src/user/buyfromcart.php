<?php
session_start();
require 'src/Database/connect.php';
// get user id
$user_id = $_SESSION['user_id'];

if (isset($_POST['address_id'])) {
    $address_id = $_POST['address_id'];
    $allcartid = "SELECT cart_id FROM cart WHERE user_id = $user_id and cart_status='incart'";
    $result = mysqli_query($conn, $allcartid);
    $cart_user_id = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cart_user_id[] = $row;
        $cart_id = $row['cart_id'];
        echo json_encode($cart_id);
    }

    // for each cart id get product id
    foreach ($cart_user_id as $cart_id) {
        $cart_id = $cart_id['cart_id'];
        $sql = "SELECT product_id,product_quantity FROM cart WHERE cart_id = $cart_id and cart_status='incart'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $product_id = $row['product_id'];
        $quantity = $row['product_quantity'];

        // get seller id from product
        $getseller = "SELECT user_id FROM product WHERE product_id='$product_id'";
        $result = mysqli_query($conn, $getseller);
        $row = mysqli_fetch_assoc($result);
        $seller_id = $row['user_id'];

        //  insert in order table
        $sql = "INSERT INTO orders (order_id, user_id, seller_id, product_id, cart_id, address_id , order_date, order_status,order_quantity)
     VALUES (NULL, '$user_id', '$seller_id', '$product_id', '$cart_id' , $address_id , CURRENT_TIMESTAMP, 'pending','$quantity')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $deleteformcart = "update cart set cart_status='ordered' where cart_id = $cart_id";
            $result = mysqli_query($conn, $deleteformcart);
            if ($result) {

                // insert into notification table
                $getorder = "SELECT order_id FROM orders WHERE user_id='$user_id' AND product_id='$product_id' AND address_id='$address_id'";
                $result = mysqli_query($conn, $getorder);
                $row = mysqli_fetch_assoc($result);
                $order_id = $row['order_id'];
            } else {
            }
            header("Location: /order");

        } else {
            echo "order not inserted";
        }
    }
}
