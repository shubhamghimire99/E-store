<?php 

session_start();
include 'src/Database/connect.php';
$buyer_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];
    $effectivedelivery = $_POST['effectivedelivery'];
    $sql = "INSERT INTO addressbook (user_id, phone, province, city, area, address, landmark, effectivedelivery) VALUES ('$buyer_id', '$phone', '$province', '$city', '$area', '$address', '$landmark', '$effectivedelivery')";
    if (mysqli_query($conn, $sql)) {
        header('Location: /address-book');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>