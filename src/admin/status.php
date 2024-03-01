<?php

    include 'src/Database/connect.php';

    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "update user set seller_status = '$status' where id = $id";

    mysqli_query($conn, $sql);

    header('Location: /admin-seller');
