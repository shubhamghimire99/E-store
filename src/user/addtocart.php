<?php
session_start();
include "src/Database/connect.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
   echo "<script> console_log($id) </script> ";
    // view the product
    $selectproducts = "select * from product where product_id='$id'";
    $result = mysqli_query($conn, $selectproducts);
    $product = mysqli_fetch_assoc($result);


    $user_id = $_SESSION['user_id'];
    $product_id = $product['product_id'];
    $product_name = $product['title'];
    $product_price = $product['price'];
    $product_image = $product['image'];
    $seller_id = $product['user_id'];

    $product_quantity = 1;
    $product_total = $product_price * $product_quantity;

    $productexists = "SELECT cart_status,product_quantity FROM cart WHERE product_id='$id' AND user_id='$user_id'";
    $result_in_cart = mysqli_query($conn, $productexists);
    $product_in_cart = mysqli_fetch_all($result_in_cart , MYSQLI_ASSOC);

    // for each product in cart, check if the product is already in cart
    foreach($product_in_cart as $product_in_cart){
        if ($product_in_cart['cart_status'] == "incart") {
            echo "<script> console.log('product already in cart'); </script>";
            $product_quantity = $product_in_cart['product_quantity'] + 1;
            $product_total = $product_price * $product_quantity;
            $sql = "UPDATE cart SET product_quantity='$product_quantity', product_total='$product_total' WHERE product_id='$id' AND user_id='$user_id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script> console.log('product added to cart updated quantity'); </script>";
                header('location: /cart');
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        if ($product_in_cart != null && $product_in_cart['cart_status'] == "incart") {
            echo "<script> console.log('product already in cart'); </script>";
            $product_quantity = $product_in_cart['product_quantity'] + 1;
            $product_total = $product_price * $product_quantity;
            $sql = "UPDATE cart SET product_quantity='$product_quantity', product_total='$product_total' WHERE product_id='$id' AND user_id='$user_id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script> console.log('product added to cart updated quantity'); </script>";
                header('location: /cart');
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } 
        // add to cart id the cart_status is deleted or delivered
        if($product_in_cart['cart_status'] == "deleted" || $product_in_cart['cart_status'] == "ordered"){
            // add product to cart
            $sql = "INSERT INTO cart (cart_id,user_id, product_id, product_name, 
            product_price, product_image, product_quantity, product_total,cart_status)
                     VALUES (NULL,'$user_id', '$product_id', '$product_name', 
                     '$product_price', '$product_image', '$product_quantity', '$product_total','incart')";
            if ($conn->query($sql) === TRUE) {
                echo "<script> console.log('product added to cart'); </script>";
                header('location: /cart');
            } else {
                echo "Error:" . mysqli_error($conn);
            }
            

        }

    }

    // if product is not in cart, add product to cart
    if ($product_in_cart == null) {
            $sql = "INSERT INTO cart (cart_id,user_id, product_id, product_name, 
            product_price, product_image, product_quantity, product_total,cart_status)
                     VALUES (NULL,'$user_id', '$product_id', '$product_name', 
                     '$product_price', '$product_image', '$product_quantity', '$product_total','incart')";
            if ($conn->query($sql) === TRUE) {
                echo "<script> console.log('product added to cart'); </script>";
                header('location: /cart');
            } else {
                echo "Error:" . mysqli_error($conn);
            }
        }
   
}
