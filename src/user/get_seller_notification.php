<?php
include('src/Database/connect.php');
session_start();


$sql = "SELECT firstname, lastname ,email, contact FROM `user` WHERE isseller = 1 AND isverified = 0"; 

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $data = array();
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
echo json_encode($data);
} else {
    $data = array();
}





?>