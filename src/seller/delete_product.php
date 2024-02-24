<?php 
    require_once "src/Database/connect.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $image_name = "select image from product where product_id = $id";
        $query_img = $conn -> query($image_name);
        $row_img = mysqli_fetch_assoc($query_img);

        $image_path = "src/images/".$row_img['image'];
        unlink($image_path);

        $sql = "DELETE FROM product WHERE product_id = $id";
        if($conn->query($sql) === TRUE){
            header("Location: /inventory");
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();

?>