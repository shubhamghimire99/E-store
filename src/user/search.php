<?php
include "src/Database/connect.php";
include "src/user/navbar.php";

// if (isset($_GET['search'])) {
//     $search = $_GET['search'];
//     $sql = "SELECT * FROM product WHERE title LIKE '%$search%'";
//     $result = mysqli_query($conn, $sql);
//     $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/src/css/buyer/landingpage.css">
    <link rel="stylesheet" type="text/css" href="/src/css/buyer/filter.css">
</head>

<body>
    <div class="filter">
        <!-- <div class="filter-content">
            <h1>Filter</h1>
            <div class="filter-type">
                <h2>Product Type</h2>
                <div class="filter-type-content">
                
                    <input type="checkbox" name="product_type" value="Laptops"> Laptops<br>
                    <input type="checkbox" name="product_type" value="Smartphones and mobile">Smartphones and mobile<br>
                    <input type="checkbox" name="product_type" value="HeadPhone And EarPhone">HeadPhone And EarPhone<br>
                    <input type="checkbox" name="product_type" value="Gaming accessories">Gaming accessories<br>
                    <input type="checkbox" name="product_type" value="Airpods and EarBuds">Airpods and EarBuds<br>
                    <input type="checkbox" name="product_type" value="Airpods and EarBuds">Airpods and EarBuds<br>
                </div>
            </div>
            <div class="filter-type">
                <h2>Price</h2>
                <div class="filter-type-content">
      
                    <input type="checkbox" name="price" value="0-10000">0-10000<br>
                    <input type="checkbox" name="price" value="10000-20000">10000-20000<br>
                    <input type="checkbox" name="price" value="20000-30000">20000-30000<br>
                    <input type="checkbox" name="price" value="30000-40000">30000-40000<br>
                    <input type="checkbox" name="price" value="40000-50000">40000-50000<br>
                    <input type="checkbox" name="price" value="50000-60000">50000-60000<br>
                </div>
            </div>
            <div class="filter-type">
                <h2>Brand</h2>
                <div class="filter-type-content">
                    
                    <?php 
                          if (isset($_GET['query'])) {
                            $searchQuery = $_GET['query'];
                            $sql = "SELECT * FROM product WHERE title LIKE '%$searchQuery%'";
                            $result = mysqli_query($conn, $sql);
                            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
                          }
                    foreach ($product as $product) : ?>

                        <input type="checkbox" name="brand" value="<?php echo $product['brand'] ?>"><?php echo $product['brand'] ?><br>
                    <?php endforeach; ?>
                </div>
            </div>
            <button>Filter products</button>
        </div> -->

        <div class="cards">

            <div class="product-card" id="ProductCards">

                <?php
                if (isset($_GET['query'])) {
                    $searchQuery = $_GET['query'];
                    $sql = "SELECT * FROM product WHERE title LIKE '%$searchQuery%'";
                    $result = mysqli_query($conn, $sql);
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);


                    if ($products) {
                        foreach ($products as $product) {
                    echo "
                        <div class= 'card'>
                            <img src='/src/images/" . $product['image'] . "' alt='image can't be loaded'>
                            <div class='card-desc'>
                                <h2 id='productTitle'>" . (strlen($product['title']) > 20 ? substr($product['title'], 0, 20) . ".." : $product['title']) . "</h2>
                                <p id='productDs' class='product_des'>" . (strlen($product['des']) > 60 ? substr($product['des'], 0, 60) . ".." : $product['des']) . "</p>
                                <h3 id='ProductPrice' class='product_price'>Rs." . number_format($product['price']) . "</h3>
                             </div>
                            <div class='additional-content'>
                                <div class='content'>
                                    <button type='submit' id='addtocartbtn' onclick='addToCart(" . $product['product_id'] . ")'>
                                        <i class='fa-solid fa-cart-plus'></i>
                                        Add To Cart
                                    </button>
                                    <div class='share'>
                                        <h6>
                                            <a href=''>
                                                <i class='fa-solid fa-share-nodes'></i>
                                                Share
                                            </a>
                                        </h6>
                                        <h6>
                                            <a href=''>
                                                <i class='fa-solid fa-code-compare'></i>
                                                Compare
                                            </a>
                                        </h6>
                                        <h6>
                                            <a href=''>
                                                <i class='fa-regular fa-heart'></i>
                                                Like
                                            </a>
                                        </h6>
                                    </div>
                                    <button onclick='showProduct(" . $product['product_id'] . ")'>
                                        Buy Now
                                    </button>
                                </div>
                            </div>    
                        </div>
                    ";
                        }
                    }
                    else{
                        echo "<h1>No product found</h1>";
                    
                    }
                }
                ?>
            </div>
        </div>

    </div> <?php include('Footer.php'); ?>

    <script src="/src/js/buyer/landingpage.js"></script>

</body>

</html>