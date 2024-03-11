<?php 
   include('src/Database/connect.php');
   session_start();

    $buyer_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM notification WHERE buyer_id = '$buyer_id'  ORDER BY notification_date DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
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
        // echo json_encode($product , JSON_PRETTY_PRINT);
        echo json_encode($notification, JSON_PRETTY_PRINT);

        // $notifications = json_encode($notification) + json_encode($product);
        // echo json_encode($notifications);
    } else {
        echo "<div> <p> No notifications </p> </div>";
    }
    $conn->close();

?>