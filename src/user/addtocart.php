<?php
session_start();
include "src/Database/connect.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // view the product
    $selectproducts = "select * from product where product_id='$id'";
    $result = mysqli_query($conn, $selectproducts);
    $product = mysqli_fetch_assoc($result);
    echo json_encode($product);
    // $user_id = $_SESSION['user_id'];
    // echo json_encode($user_id);
    // post data in cart database
   
    $user_id = $_SESSION['user_id'];
    $product_id = $product['product_id'];
    $product_name = $product['title'];
    $product_price = $product['price'];
    $product_image = $product['image'];
    
    $product_quantity = 1;
    $product_total = $product_price * $product_quantity;


    $sql = "INSERT INTO cart (cart_id,user_id, product_id, product_name, 
    product_price, product_image, product_quantity, product_total)
             VALUES (NULL,'$user_id', '$product_id', '$product_name', 
             '$product_price', '$product_image', '$product_quantity', '$product_total')";
    


    if($conn->query($sql) === TRUE){
        header('location: /cart');
    }else{
        echo "Error:" .mysqli_error($conn);
    }

    // if id exists in cart table then add in quantity
    //  $productexists = "SELECT * FROM cart WHERE product_id='$id' AND user_id='$user_id'";
    //     $result = mysqli_query($conn, $productexists );
    //     $products = mysqli_fetch_assoc($result);
    //     if ($products) {
    //         $product_quantity = $product['product_quantity'] + 1;
    //         $product_total = $product['product_price'] * $product_quantity;
    //         $sql = "UPDATE cart SET product_quantity='$product_quantity', product_total='$product_total' WHERE product_id='$id' AND user_id='$user_id'";
    //         if ($conn->query($sql) === TRUE) {
    //             header('location: /cart');
    //         } else {
    //             echo "Error: " . mysqli_error($conn);
    //         }
    //     }
}

