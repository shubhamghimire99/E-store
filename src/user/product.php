<?php


include 'src/database/connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // view the product
    $sql = "select * from product where product_id='$id'";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Product</title>
    <link rel="stylesheet" href="/src/css/buyer/product.css">
</head>

<body>
    <div class="background">
        <?php include 'Navbar.php'; ?>
        <div class="home">
            <a href="">
                <h3 class="h3">
                    <a href="/"> Home</a>
                </h3>
            </a>
            <h3 class="product-name">
                <?php echo $product["title"] ?>
            </h3>
        </div>
        <div class="container">
            <div class="side-image">
                <div class="image">
                    
                </div>
                <div class="image">

                </div>
                <div class="image">

                </div>
                <div class="image">

                </div>
            </div>
            <div class="main-image">
                <div class="inner-image">
                    <img src="/src/images/<?php echo $product['image']; ?>" alt="">
                </div>
            </div>
            <div class="description">
                <h1><?php echo $product["title"] ?></h1>
                <h3>RS. <?php echo $product["price"] ?></h3>
                <!-- <div class="ratings">
                    <svg width="124" height="20" viewBox="0 0 124 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 1L13 7L19 7.75L14.88 12.37L16 19L10 16L4 19L5.13 12.37L1 7.75L7 7L10 1Z" fill="#FFC700" />
                        <path d="M36 1L39 7L45 7.75L40.88 12.37L42 19L36 16L30 19L31.13 12.37L27 7.75L33 7L36 1Z" fill="#FFC700" />
                        <path d="M62 1L65 7L71 7.75L66.88 12.37L68 19L62 16L56 19L57.13 12.37L53 7.75L59 7L62 1Z" fill="#FFC700" />
                        <path d="M88 1L91 7L97 7.75L92.88 12.37L94 19L88 16L82 19L83.13 12.37L79 7.75L85 7L88 1Z" fill="#FFC700" />
                        <path d="M111.156 7.0125L104.8 7.9375L109.4 12.4188L108.312 18.75L114 15.7625V1.25L111.156 7.0125Z" fill="#FFC700" />
                    </svg>
                    <p>5 customer review</p>
                </div> -->
                <div class="paragraph">
                    <p><?php echo $product["short_des"] ?></p>
                </div>
                <!-- <h5>Size</h5>
                <div class="size">
                    <div class="size-box">
                        <p>L</p>
                    </div>
                    <div class="size-box">
                        <p>XL</p>
                    </div>
                    <div class="size-box">
                        <p>XS</p>
                    </div>
                </div> -->
                <!-- <h5>Color</h5>
                <div class="color">
                    <div class="colorbox1">
                    </div>
                    <div class="colorbox2">
                    </div>
                    <div class="colorbox3">
                    </div>
                </div> -->

                <div class="cart">
                    <div class="quantity">
                        <button class="decrease" onclick="decreaseQuantity()" >-</button>
                        <p id="quantity">0</p>
                        <button class="increase" onclick="increaseQuantity()"  >+</button>
                    </div>
                    <button onclick="buyNow(<?php echo  $product['product_id'] ?>)">Buy now</button>
                    <button onclick="addToCart(<?php echo  $product['product_id'] ?>)">Add to Cart</button>
                </div>
                <hr>
                <div class="des-footer">
                    <div class="footer-1">
                        <p>SKU</p>
                        <p>Category</p>
                        <p>Share</p>
                    </div>
                    <div class="footer-2">
                        <p>: SS001</p>
                        <p>: <?php echo $product["product_type"] ?></p>
                        <div class="icons">
                            <p>:</p><a href=""><i class="fab fa-facebook"></i></a><a href=""><i class="fab fa-linkedin"></i></a><a href=""><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="description-2">
            <hr>
            <h1>Description</h1>
            <div class="des-list">
                <p><?php echo $product["short_des"] ?></p>
                <p><?php echo $product["des"] ?></p>
            </div>
            <div class="image-container">
                <div class="des-image">
                    <img src="/src/images/Cloud sofa three seater + ottoman_1 1.png" alt="">
                </div>
                <div class="des-image">
                    <img src="/src/images/Cloud sofa three seater + ottoman_1 1.png" alt="">
                </div>
            </div>
        </div>

        <div class="product-card">

        </div>
    </div>
    <script src="/src/js/buyer/product.js"></script>
</body>

</html>