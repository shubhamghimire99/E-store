

<?php
$servername = "localhost";
$username = "root";
$password = "ROOT";
$dbname = "ESTORE";

// Create Connection
$conn = new mysqli($servername, $username, $password , $dbname);

if ($conn->connect_error) {
    die("connection Failed: " . $conn->connect_error);
}



// echo "Connected Successfully";  
?>