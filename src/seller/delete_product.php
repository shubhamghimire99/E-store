<?php 
    require_once "src/Database/connect.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM product WHERE product_id = $id";
        if($conn->query($sql) === TRUE){
            header("Location: /inventory");
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();

?>