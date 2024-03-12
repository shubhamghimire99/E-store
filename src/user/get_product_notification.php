<?php 
    session_start();
    include('src/Database/connect.php');
    $seller_id = $_SESSION['user_id'];
    $sql =  "SELECT title,image,quantity FROM `product` WHERE user_id = '$seller_id' AND product_status = 'active' ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo "0 results";
    }


?>