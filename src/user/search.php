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
    <title>search</title>
    <link rel="stylesheet" type="text/css" href="/src/css/buyer/landingpage.css">
    <link rel="stylesheet" type="text/css" href="/src/css/buyer/filter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="filter">
        <div class="filter-content">
            <h1>Filter</h1>
            <form id="priceRangeForm">
                <label for="minPrice">Min Price:</label>
                <input type="number" id="minPrice" name="minPrice">

                <label for="maxPrice">Max Price:</label>
                <input type="number" id="maxPrice" name="maxPrice">

                <button type="button" onclick="filterProducts()">Apply Filter</button>
            </form>

        </div>
        <div class="cards" id="productsContainer">

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
                    } else {
                        echo "<h1>No product found</h1>";
                    }
                }
                ?>
            </div>
        </div>

    </div> <?php include('Footer.php'); ?>

    <!-- <script src="/src/js/buyer/landingpage.js"></script> -->
    <script>
        function filterProducts() {
            var minPrice = $('#minPrice').val();
            console.log(minPrice);
            var maxPrice = $('#maxPrice').val();
            console.log(maxPrice);
            $.ajax({
                type: 'GET',
                url: '/filter_products',
                data: {
                    minPrice: minPrice,
                    maxPrice: maxPrice
                },
                success: function(response) {
                    $('#productsContainer').html(response);
                }
            });
        }
    </script>
</body>

</html>