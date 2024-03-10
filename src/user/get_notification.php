<?php 
   include('src/Database/connect.php');
   session_start();

    $buyer_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM notification WHERE buyer_id = '$buyer_id' ORDER BY notification_date DESC";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
           $notification[] = $row;
        }
        echo json_encode($notification);
       
    } else {
        echo "<div> <p> No notifications </p> </div>";
    }
    $conn->close();

?>