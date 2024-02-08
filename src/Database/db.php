

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ESTORE";

// Create Connection
$conn = new mysqli($servername, $username, $password , $dbname);

if ($conn->connect_error) {
    die("connection Failed: " . $conn->connect_error);
}



// Create Database
// $create_db = "CREATE DATABASE ESTORE";
// if($conn -> query($create_db) == TRUE){
//     echo "Success";
// }else{
//     echo "error Creating database " .$conn->error;
// }


// Create Table

$create_table_user = "CREATE TABLE USER 
    (id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) , firstname VARCHAR(30) NOT NULL,
    lastName(30) NOT NULL, contact int(15) NOT NULL,
    pass(16) NOT NULL, 
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if($conn -> query($create_table_user)==TRUE){
        echo "Table Created Succesfully";
    }else{
        echo "Error creating table ".$conn->error;
    }

    $conn->close();
?>
