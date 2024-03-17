<?php

function getSellerInfo($id)
{
    // Create connection
    include '/src/database/connect.php';
    $sql = "SELECT firstname,lastname,contact,email FROM user WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch seller information
    $sellerInfo = $result->fetch_assoc();

    // Close connection
    $stmt->close();
    $conn->close();

    return $sellerInfo;
}

$id = $_GET['id'];
$sellerInfo = getSellerInfo($id);

// Return JSON response
if ($sellerInfo) {
    echo json_encode(array(
        "success" => true,
        "name" => $sellerInfo['name'],
        "email" => $sellerInfo['email']
    ));
} else {
    echo json_encode(array("success" => false));
}

?>
