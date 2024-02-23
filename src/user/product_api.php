<?php
include_once 'src/Database/connect.php';
 
extract($_GET);


$sql = "SELECT * FROM product limit $limit";
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($products);


?>
