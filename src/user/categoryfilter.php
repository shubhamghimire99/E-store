<?php
include "src/user/navbar.php";

include "src/Database/connect.php";


$product_type = $_GET['product_type'];

$query = "SELECT * FROM product WHERE product_type = '$product_type'";
$result = mysqli_query($conn, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// print the product id



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product_type ?></title>
    <link rel="stylesheet" type="text/css" href="/src/css/buyer/landingpage.css">
    <link rel="stylesheet" type="text/css" href="/src/css/buyer/filter.css">
    <link rel="stylesheet" href="/src/css/fadeup.css">
</head>

<body>
    <div class="filter">
        <div class="filter-content">
            <h1>Filter</h1>
            <!-- <div class="filter-type">
                <h2>Product Type</h2>
               <div class="filter-type-content">
                    in check box
                    <input type="checkbox" name="product_type" value="Laptops"> Laptops<br>
                    <input type="checkbox" name="product_type" value="Smartphones and mobile">Smartphones and mobile<br>
                    <input type="checkbox" name="product_type" value="HeadPhone And EarPhone">HeadPhone And EarPhone<br>
                    <input type="checkbox" name="product_type" value="Gaming accessories">Gaming accessories<br>
                    <input type="checkbox" name="product_type" value="Airpods and EarBuds">Airpods and EarBuds<br>
                    <input type="checkbox" name="product_type" value="Airpods and EarBuds">Airpods and EarBuds<br>
                </div>
            </div> -->
            <div class="filter-type">
                <h2>Price</h2>
                <div class="filter-type-content">
                    in check box
                    <form id='price-filter'>
                        <input type="checkbox" name="price[]" value="0-10000">0-10000<br>
                        <input type="checkbox" name="price[]" value="10000-20000">10000-20000<br>
                        <input type="checkbox" name="price[]" value="20000-30000">20000-30000<br>
                        <input type="checkbox" name="price[]" value="30000-40000">30000-40000<br>
                        <input type="checkbox" name="price[]" value="40000-50000">40000-50000<br>
                        <input type="checkbox" name="price[]" value="50000-60000">50000-60000<br>
                        <input type="checkbox" name="price[]" value="60000-70000">60000-70000<br>
                        <input type="checkbox" name="price[]" value="70000-80000">70000-80000<br>
                        <input type="checkbox" name="price[]" value="80000-90000">80000-90000<br>
                        <input type="checkbox" name="price[]" value="90000-100000">90000-100000<br>
                        <input type="checkbox" name="price[]" value="100000-110000">100000-110000<br>
                        <input type="checkbox" name="price[]" value="110000-120000">110000-120000<br>
                        <input type="checkbox" name="price[]" value="120000-130000">120000-130000<br>
                        <input type="checkbox" name="price[]" value="130000-140000">130000-140000<br>
                    </form>
                </div>
            </div>
            <!-- <div class="filter-type">
                <h2>Brand</h2>
                <div class="filter-type-content">
                    <?php foreach ($products as $product) : ?>
                        <input type="checkbox" name="brand" value="<?php echo $product['brand'] ?>"><?php echo $product['brand'] ?><br>
                    <?php endforeach; ?>
                </div>
            </div> -->
            <button id="filter-button">Apply Filter</button>
        </div>

        <div class="cards">
            <h1>products - <?php echo $product_type ?></h1>
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
            <div class="btn">
                <button id="loadmorebtn" onclick="loadMore()">Show More</button>
                <!-- <div id="loading" class="loading-animation" style="display: none;">
                </div> -->
            </div>
            <div id="loading" class="typing-indicator" style="display: none;">
                <div class="typing-circle"></div>
                <div class="typing-circle"></div>
                <div class="typing-circle"></div>
                <div class="typing-shadow"></div>
                <div class="typing-shadow"></div>
                <div class="typing-shadow"></div>
            </div>
            <?php include('Footer.php'); ?>
        </div>
        <script src="/src/js/buyer/filter.js"></script>
        <!-- <script src="/src/js/buyer/landingpage.js"></script> -->
</body>

</html>