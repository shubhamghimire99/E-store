<?php
// Allow origin header
include "src/Database/connect.php";
header('Access-Control-Allow-Origin: *');

// Get the token from the POST request
$payload = $_POST['payload'];
// $amount = $_POST['amount'];
// $product_id = $_POST['product_id'];
// $product_name = $_POST['product_name'];
$token = json_decode($payload)->token;
$amount = json_decode($payload)->amount;
$product_id = json_decode($payload)->product_identity;
// $product_name = json_decode($payload)->product_name;

// Build the request parameters
$args = http_build_query(array(
  'token' => $token,
  'amount' => $amount
));

// $sql = "INSERT INTO payment (payment_id, product_id, amount) VALUES (NULL, '$product_id', '$amount')";
// $result = mysqli_query($conn, $sql);
// if ($result) {
//   echo "Payment added to database";
// } else {
//   echo "Error: " . mysqli_error($conn);
// }




$url = "https://khalti.com/api/v2/payment/verify/";

// Initialize cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$headers = ['Authorization: Key test_secret_key_551c63ab6c59499daab811b3846a8b7d'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute the cURL request
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Check for errors
if ($response === false) {
  $error_message = curl_error($ch);
  $response = array(
    'error' => 1,
    'message' => 'cURL Error: ' . $error_message
  );
} elseif ($status_code == 200) {

  $sql = "INSERT INTO payment (payment_id, product_id, amount) VALUES (NULL,'$product_id', '$amount')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    // echo "Payment added to database";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  $response = array(
    'success' => 1,
    'message' => 'Payment verification successful. Thank you for your purchase.',
    'data' => json_decode($response)
  );

  // insert the product id and product amount in database by fetchng form response

} else {
  // If the status code is not 200, construct an error response
  $response = array(
    'error' => 1,
    'message' => 'Payment verification failed. Please try again.'
  );
}

// Close cURL session
curl_close($ch);

// Set the Content-Type header to JSON
header('Content-Type: application/json');

// Echo the JSON-encoded response
echo json_encode($response);
