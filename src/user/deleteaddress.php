<?php 
    include "src/Database/connect.php";

    // delete address
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "update addressbook set address_status = 'deleted' WHERE address_id = $id ";
        if(mysqli_query($conn, $sql)){
            header("location: /address-book");
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>