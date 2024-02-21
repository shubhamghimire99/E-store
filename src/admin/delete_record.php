<?php
    include("src/Database/connect.php");

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn , $_GET['id'] );

        $sql = "DELETE FROM user WHERE id='$id'";

        if(mysqli_query($conn, $sql)){
            // echo "record deleted Sucessfully";
            header("Location: /sellers");
        }
        else{
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }else{
        echo "ID parameter is Missing";
    }

?>