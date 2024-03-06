<?php
session_start();
include "src/database/connect.php";
$buyer_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['address_id'];
    echo $id;
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];
    $effectivedelivery = $_POST['effectivedelivery'];

    echo 

    $sql = "UPDATE addressbook SET phone = '$phone', 
        province = '$province', city = '$city', area = '$area', 
        address = '$address', landmark = '$landmark', effectivedelivery = '$effectivedelivery' 
        WHERE address_id = '$id' AND user_id = '$buyer_id' and address_status = 'active'";
   
   if(mysqli_query($conn, $sql)){
        header('Location: /address-book');
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
