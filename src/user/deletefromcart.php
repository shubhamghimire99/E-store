<?php
    include "src/Database/connect.php";


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM cart WHERE cart_id = $id";
        if (mysqli_query($conn, $sql)) {
            header("Location: /cart");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

?>