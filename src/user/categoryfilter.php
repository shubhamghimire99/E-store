<?php
    include "src/Database/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filer</title>
</head>
<body>
    <?php
        $product_type = $_GET['product_type'];
            
            $query = "SELECT * FROM product WHERE product_type = '$product_type'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<h1>".$row['title']."</h1>";
                    echo "<p>".$row['price']."</p>";
                    echo "<p>".$row['des']."</p>";
                    echo "<img src='/src/images/".$row['image']."'>";
                    echo "<p>".$row['product_type']."</p>";
                    echo "<a href='/productdetails?id=".$row['product_id']."'>View</a>";
                }
            }
            else{
                echo "No product found";
            }
    ?>    

</body>
</html>