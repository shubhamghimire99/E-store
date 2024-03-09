<?php
session_start();
    include "src/Database/connect.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "update cart set cart_status='deleted',product_quantity=NULL where cart_id = $id";
        if (mysqli_query($conn, $sql)) {
            header("Location: /cart");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

?>