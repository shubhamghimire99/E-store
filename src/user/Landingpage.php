<!-- landing page for buyer -->
<?php
// include 'src/user/authentication.php';
include 'src/user/Navbar.php';

include 'src/database/connect.php';

// get all products
$sql = "SELECT * FROM product limit 8";
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/css/buyer/landingpage.css">
    <link rel="stylesheet" href="/src/css/fadeup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Home</title>

</head>

<body>
    <div class="main">

        <div class="first-main">
            <div class="categories">
                <div class="category">
                    <a href='/filter?product_type=laptop'>
                        <i class="fa-solid fa-laptop"></i>
                        Laptops
                    </a>
                </div>
                <div class="category">
                    <a href='/filter?product_type=Smartphones and mobile'>
                        <i class="fa-solid fa-mobile"></i>
                        Smartphones and mobile
                    </a>
                </div>
                <div class="category">
                    <a href='/filter?product_type=Monitors'> <i class="fa-solid fa-tv"></i>
                        Monitors
                    </a>
                </div>
                <div class="category">
                    <a href='/filter?product_type=HeadPhone And EarPhone'>
                        <i class="fa-solid fa-headset"></i>
                        HeadPhone And EarPhone
                    </a>
                </div>
                <div class="category">
                    <a href='/filter?product_type=Gaming accessories'>
                        <i class="fa-solid fa-gamepad"></i>
                        Gaming accessories
                    </a>
                </div>
                <div class="category">
                    <a href='/filter?product_type=Airpods and EarBuds'>
                        <i class="fa-brands fa-apple"></i>
                        Airpods and EarBuds
                    </a>
                </div>
                <div class="category">
                    <a href='/filter?product_type=KeyBoards and Mouse'>
                        <i class="fa-solid fa-computer-mouse"></i>
                        Airpods and EarBuds
                    </a>
                </div>
            </div>

            <div class="slider">
                <!-- insert image -->
                <!-- <img class="slidshow-img" src="../images/daniel-romero-SG8V9r1BiIc-unsplash.jpg" alt="image can't be loaded"> -->
                <div class="slides">
                    <!-- radio-btn  start-->
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">
                    <input type="radio" name="radio-btn" id="radio5">
                    <!-- radio-btn end -->

                    <!-- slide images start -->
                    <div class="slide first" id="slider">
                        <a href="">
                            <img src="/src/images/slider/daniel-romero-6V5vTuoeCZg-unsplash.jpg" alt="">
                        </a>
                    </div>
                    <div class="slide">
                        <img src="/src/images/slider/fotis-fotopoulos-6sAl6aQ4OWI-unsplash.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="/src/images/slider//insung-yoon-N1QwvJDvj4E-unsplash.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="/src/images/slider/mohamed-m-6MXDP9u6fmU-unsplash.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="/src/images/slider/rishabh-malhotra-83ypHTv6J2M-unsplash.jpg" alt="">
                    </div>
                    <!-- Slide image end -->
                    <!-- automatic navigation start -->
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                        <div class="auto-btn5"></div>
                    </div>
                    <!-- automatic navigation end -->
                </div>

                <!-- manual navigation start -->
                <div class="navigation-manual">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                    <label for="radio4" class="manual-btn"></label>
                    <label for="radio5" class="manual-btn"></label>
                </div>
                <!-- manual navigation end -->
            </div>
        </div>

        <div class="browse">
            <h1>Browse Our Categories</h1>
            <!-- <span>We provide Varities of Products</span> -->

            <div class="category">
                <div class="product">
                    <a href='/filter?product_type=laptop'>
                        <img class="product-img" src="/src/images/dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg" alt="image can't be loaded">
                        <span>Laptops</span>
                    </a>
                </div>
                <div class="product">
                    <a href='/filter?product_type=Gaming accessories'>
                        <img class="product-img" src="/src/images/nathan-fertig-FBXuXp57eM0-unsplash.jpg" alt="image can't be loaded">
                        <span>Gaming accessories</span>
                    </a>
                </div>
                <div class="product">
                    <a href='/filter?product_type=KeyBoards and Mouse'>
                        <img class="product-img" src="/src/images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                        <span>KeyBoards and Mouse</span>
                    </a>
                </div>
            </div>

        </div>

        <div class="cards fade-up">
            <h1>Our Products</h1>
            <div class="product-card" id="ProductCards">
                <?php foreach ($products as $product) : ?>
                    <div class="card">
                        <img src="/src/images/<?php echo $product['image']; ?>" alt="image can't be loaded">
                        <div class="card-desc">
                            <h2 id="productTitle"><?php echo strlen($product['title']) > 20 ? substr($product['title'], 0, 20) . ".." : $product['title']; ?></h2>
                            <?php $short_description = strlen($product['des']) > 60 ? substr($product['des'], 0, 60) . ".." : $product['des']; ?>
                            <p id="productDs" class="product_des"><?php echo $short_description; ?></p>

                            <h3 id="ProductPtice" class="product_price">Rs.<?php echo number_format($product['price']); ?></h3>
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

    </div>
    <script src="/src/js/buyer/landingpage.js"></script>

    <script src="/src/js/FadeUpAnimation.js"></script>

</body>

</html>