<?php 
    include("src/Database/connect.php");

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn , $_GET['id'] );
        // verify the user
        $sql = "UPDATE user SET isVerified = 1 WHERE id='$id'";

        if(mysqli_query($conn, $sql)){
            // echo "record deleted Sucessfully";
            header("Location: /sellerverify");
        }
        // if isverified=1 then send alert message
        

        else{
            echo "Error verifing seller: " . mysqli_error($conn);
            
        }

    }


?>