<?php
include "src/Database/connect.php";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM product WHERE title LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>