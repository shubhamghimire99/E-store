<?php 
    session_start();
    include('src/Database/connect.php');
    $buyer_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM notification WHERE buyer_id = '$buyer_id' and notification_status = 'unread' ORDER BY notification_date DESC";
    $notification = array();
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)> 0){
        while($row = mysqli_fetch_assoc($result)){
            $notification[] = $row;
            $product_id[] = $row['product_id'];
        }
        foreach($product_id as $id){
            $sql = "SELECT * FROM product WHERE product_id = '$id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                   $product[] = $row;
                }
            }
        }
        echo json_encode($product);
        echo json_encode($notification);
    }



?>