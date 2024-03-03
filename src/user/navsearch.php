<?php
include "src/Database/connect.php";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM product WHERE title LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($product);
}

?>