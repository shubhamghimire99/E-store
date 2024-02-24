<?php
session_start();
include "src/Database/connect.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // get product price form db
    $sql = "SELECT * FROM cart WHERE cart_id = $id";
    $result = mysqli_query($conn, $sql);
    $cart_item = mysqli_fetch_assoc($result);
    $sub = "UPDATE cart SET product_quantity = product_quantity - 1 WHERE cart_id = $id";
   
    if ($cart_item['product_quantity'] == 1) {
        $sub = "DELETE FROM cart WHERE cart_id = $id";
    }

    if (mysqli_query($conn, $sub)) {
        header("Location: /cart");
    } else {
        echo "Error: " . $sub . "<br>" . mysqli_error($conn);
    }

    $subtotal = "UPDATE cart SET product_total = product_total - " . $cart_item['product_price'] . " WHERE cart_id = $id";
    if (mysqli_query($conn, $subtotal)) {
        header("Location: /cart");
    } else {
        echo "Error: " . $add . "<br>" . mysqli_error($conn);
    }
}
?>