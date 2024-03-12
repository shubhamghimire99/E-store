<?php
include('src/Database/connect.php');
session_start();

$buyer_id = $_SESSION['user_id'];

// Order table get all order and status with product details
$sql =  "SELECT * FROM `orders` WHERE user_id = '$buyer_id' ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      
        $product_id = $row['product_id'];
        $sql1 = "SELECT title,image,quantity FROM `product` WHERE product_id = '$product_id'";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                // place order status in array in same index as the product
                $row1['order_status'] = $row['order_status'];
                $data[] = $row1;
               
            }
        }
    }
    echo json_encode($data);
} else {
    echo "0 results";
}
?>
