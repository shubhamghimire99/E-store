<?php
// Assuming $products is your array of products
include 'src/Database/connect.php';


$minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : 0;
$maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : PHP_INT_MAX;

// Filter the products

$sql = "SELECT * FROM product WHERE price BETWEEN $minPrice AND $maxPrice";
$result = mysqli_query($conn, $sql);
$filteredProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);


// foreach ($filteredProducts as $product) {
    
//     // Assuming $product array is defined with necessary information
    
//     echo '<div class="card">';
//     echo '    <img src="/src/images/' . $product['image'] . '" alt="image can\'t be loaded">';
//     echo '    <div class="card-desc">';
//     echo '        <h2 id="productTitle">' . (strlen($product['title']) > 20 ? substr($product['title'], 0, 20) . ".." : $product['title']) . '</h2>';
//     $short_description = strlen($product['des']) > 60 ? substr($product['des'], 0, 60) . ".." : $product['des'];
//     echo '        <p id="productDs" class="product_des">' . $short_description . '</p>';
//     echo '        <h3 id="ProductPrice" class="product_price">Rs.' . number_format($product['price']) . '</h3>';
//     echo '    </div>';
//     echo '    <div class="additional-content">';
//     echo '        <div class="content">';
//     echo '            <button type="submit" id="addtocartbtn" onclick="addToCart(' . $product['product_id'] . ')">';
//     echo '                <i class="fa-solid fa-cart-plus"></i>';
//     echo '                Add To Cart';
//     echo '            </button>';
//     echo '            <div class="share">';
//     echo '                <h6>';
//     echo '                    <a href="">';
//     echo '                        <i class="fa-solid fa-share-nodes"></i>';
//     echo '                        Share';
//     echo '                    </a>';
//     echo '                </h6>';
//     echo '                <h6>';
//     echo '                    <a href="">';
//     echo '                        <i class="fa-solid fa-code-compare"></i>';
//     echo '                        Compare';
//     echo '                    </a>';
//     echo '                </h6>';
//     echo '                <h6>';
//     echo '                    <a href="">';
//     echo '                        <i class="fa-regular fa-heart"></i>';
//     echo '                        Like';
//     echo '                    </a>';
//     echo '                </h6>';
//     echo '            </div>';
//     echo '            <button onclick="showProduct(' . $product['product_id'] . ')">';
//     echo '                Buy Now';
//     echo '            </button>';
//     echo '        </div>';
//     echo '    </div>';
//     echo '</div>';
    
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product_type ?></title>
    <link rel="stylesheet" type="text/css" href="/src/css/buyer/landingpage.css">
    <link rel="stylesheet" type="text/css" href="/src/css/buyer/filter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/src/css/fadeup.css">
</head>

<body>
    <!-- <div class="filter"> -->
    
            <div class="product-card">

                <?php foreach ($filteredProducts as $product) : ?>
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
</body>

</html>
