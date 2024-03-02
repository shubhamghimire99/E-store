<?php
include "src/user/navbar.php";

include "src/Database/connect.php";


$product_type = $_GET['product_type'];

$query = "SELECT * FROM product WHERE product_type = '$product_type'";
$result = mysqli_query($conn, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filer</title>
    <link rel="stylesheet" type="text/css" href="/src/css/buyer/landingpage.css">
    <link rel="stylesheet" href="/src/css/fadeup.css">
</head>

<body>
    <div class="main">
        <div class="cards">
            <h1>products - <?php  echo $product_type ?></h1>
            <div class="product-card" id="ProductCards">
                
                <?php foreach ($products as $product) : ?>
                    <div class="card">
                        <img src="/src/images/<?php echo $product['image']; ?>" alt="image can't be loaded">
                        <div class="card-desc">
                            <h2 id="productTitle"><?php echo strlen($product['title']) > 20 ? substr($product['title'], 0, 20) . ".." : $product['title']; ?></h2>
                            <?php $short_description = strlen($product['des']) > 60 ? substr($product['des'], 0, 60) . ".." : $product['des']; ?>
                            <p id="productDs" class="product_des"><?php echo $short_description; ?></p>

                            <h3 id="ProductPrice" class="product_price">Rs.<?php echo number_format($product['price']); ?></h3>
                        </div>
                        <div class="additional-content">
                            <div class="content">

                                <button type="submit" id="addtocartbtn" onclick="addToCart(<?php echo  $product['product_id'] ?>)">
                                    <i class="fa-solid fa-cart-plus"></i>
                                    Add To Cart
                                </button>

                                <div class="share">
                                    <h6>
                                        <a href="">
                                            <i class="fa-solid fa-share-nodes"></i>
                                            Share
                                        </a>
                                    </h6>
                                    <h6>
                                        <a href="">
                                            <i class="fa-solid fa-code-compare"></i>
                                            Compare
                                        </a>
                                    </h6>
                                    <h6>
                                        <a href="">
                                            <i class="fa-regular fa-heart"></i>
                                            Like
                                        </a>
                                    </h6>
                                </div>
                                <button onclick="showProduct(<?php echo  $product['product_id'] ?>)">
                                    Buy Now
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <!-- <div class="btn">
                <button id="loadmorebtn" onclick="loadMore()">Show More</button>
            </div>
            <div id="loading" class="typing-indicator" style="display: none;">
                <div class="typing-circle"></div>
                <div class="typing-circle"></div>
                <div class="typing-circle"></div>
                <div class="typing-shadow"></div>
                <div class="typing-shadow"></div>
                <div class="typing-shadow"></div>
            </div> -->
            <?php include('Footer.php'); ?>

        </div>
    </div>
</body>

</html>