<?php

  

$url = "https://khalti.com/api/v2/payment/verify/";
//Check if the data is received via POST
if($_SERVER['REQUEST_METHOD']=='POST'){
  
  //Assuming 'payload' is the key in the POST data
  if(isset($_POST['payload'])){
    // Get the payload data
    $payload = $_POST['payload'];

    $payloadData = json_decode($payload, true);

    // Get the token from the payload
    $token = $payloadData['token'];
    // Make a request to Khalti
    $args = http_build_query(array(
      'token' => $token,
      'amount'  => 1000
    ));
    
    # Make the call using API.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$headers = ['Authorization: Key test_secret_key_b76fe0c2503340dda297c8a17e9cf1d8'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Response
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


curl_close($ch);

// phpinfo();
if ($status_code == 200) {
  // If the status code is 200 (success), construct a success response
  $response = array(
      'success' => 1,
      'message' => 'Payment verification successful. Thank you for your purchase.'
  );
} else {
  // If the status code is not 200, construct an error response
  $response = array(
      'error' => 1,
      'message' => 'Payment verification failed. Please try again.'
  );
}

// Set the Content-Type header to JSON
header('Content-Type: application/json');

// Echo the JSON-encoded response
echo json_encode($response);
  }
}else{
  echo"not received";
}

