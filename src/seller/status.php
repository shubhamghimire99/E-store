<?php

    include 'src/Database/connect.php';

    $id = $_GET['order_id'];
    $status = $_GET['status'];

    $sql = "update orders set order_status = '$status'
     where order_id = $id";

    mysqli_query($conn, $sql);

    header('Location: /seller-order');