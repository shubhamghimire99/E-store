<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/buyer/landingpage.css">
    <link rel="stylesheet" href="../css/fadeup.css">
    <title>Home</title>

</head>

<body>
    <div class="main">
        <?php include 'Navbar.php'; ?>
        <div class="first-main">
            <div class="categories">
                <div class="category">
                    <a href="">
                        <i class="fa-solid fa-person-dress"></i>
                        Women's Fashion
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <i class="fa-solid fa-shirt"></i>
                        Men's Fashion
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <i class="fa-solid fa-mobile"></i>
                        Electronics
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <i class="fa-solid fa-couch"></i>
                        Home & Lifestyle
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <i class="fa-solid fa-capsules"></i>
                        Medicine
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <i class="fa-solid fa-volleyball"></i>
                        Sports and Outdoor
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <i class="fa-solid fa-baby-carriage"></i>
                        baby & Toys
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
                    <div class="slide first">
                        <img src="../images/slider/angela-bailey-jlo7Bf4tUoY-unsplash.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="../images/slider/christopher-gower-_aXa21cf7rY-unsplash.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="../images/slider/denny-muller-mGP8gyGb8zY-unsplash.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="../images/slider/jazmin-quaynor-FoeIOgztCXo-unsplash.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="../images/slider/virender-singh-hE0nmTffKtM-unsplash.jpg" alt="">
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
                    <a href="">
                        <img class="product-img" src="../images/dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg" alt="image can't be loaded">
                        <span>Electronics</span>
                    </a>
                </div>
                <div class="product">
                    <a href="">
                        <img class="product-img" src="../images/nathan-fertig-FBXuXp57eM0-unsplash.jpg" alt="image can't be loaded">
                        <span>Furnitures</span>
                    </a>
                </div>
                <div class="product">
                    <a href="">
                        <img class="product-img" src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                        <span>Shoes </span>
                    </a>
                </div>
            </div>

        </div>

        <div class="cards">
            <h1 class="fade-up">Our Products</h1>
            <div class="product-card" id="ProductCards">
                <div class="card fade-up">
                    <!-- <div class="card-image"> -->
                    <img src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                    <!-- </div> -->
                    <div class="card-desc">
                        <h3>Shoes</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <h6>Rs.2000</h6>
                        <ul>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>

                    <div class="additional-content">
                        <div class="content"> 
                            <button>
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
                            <button>
                                <a href="product.php">Buy Now</a>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card fade-up">
                    <!-- <div class="card-image"> -->
                    <img src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                    <!-- </div> -->
                    <div class="card-desc">
                        <h3>Shoes</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <h6>Rs.2000</h6>
                        <ul>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>

                    <div class="additional-content">
                        <div class="content"> 
                            <button>
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
                            <button>
                                <a href="product.php">Buy Now</a>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card fade-up">
                    <!-- <div class="card-image"> -->
                    <img src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                    <!-- </div> -->
                    <div class="card-desc">
                        <h3>Shoes</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <h6>Rs.2000</h6>
                        <ul>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>

                    <div class="additional-content">
                        <div class="content"> 
                            <button>
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
                            <button>
                                <a href="product.php">Buy Now</a>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card fade-up">
                    <!-- <div class="card-image"> -->
                    <img src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                    <!-- </div> -->
                    <div class="card-desc">
                        <h3>Shoes</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <h6>Rs.2000</h6>
                        <ul>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>

                    <div class="additional-content">
                        <div class="content"> 
                            <button>
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
                            <button>
                                <a href="product.php">Buy Now</a>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card fade-up">
                    <!-- <div class="card-image"> -->
                    <img src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                    <!-- </div> -->
                    <div class="card-desc">
                        <h3>Shoes</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <h6>Rs.2000</h6>
                        <ul>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>

                    <div class="additional-content">
                        <div class="content"> 
                            <button>
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
                            <button>
                                <a href="product.php">Buy Now</a>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card fade-up">
                    <!-- <div class="card-image"> -->
                    <img src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                    <!-- </div> -->
                    <div class="card-desc">
                        <h3>Shoes</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <h6>Rs.2000</h6>
                        <ul>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>

                    <div class="additional-content">
                        <div class="content"> 
                            <button>
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
                            <button>
                                <a href="product.php">Buy Now</a>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card fade-up">
                    <!-- <div class="card-image"> -->
                    <img src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                    <!-- </div> -->
                    <div class="card-desc">
                        <h3>Shoes</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <h6>Rs.2000</h6>
                        <ul>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>

                    <div class="additional-content">
                        <div class="content"> 
                            <button>
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
                            <button>
                                <a href="product.php">Buy Now</a>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card fade-up">
                    <!-- <div class="card-image"> -->
                    <img src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                    <!-- </div> -->
                    <div class="card-desc">
                        <h3>Shoes</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <h6>Rs.2000</h6>
                        <ul>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star checked"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>

                    <div class="additional-content">
                        <div class="content"> 
                            <button>
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
                            <button>
                                <a href="product.php">Buy Now</a>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="btn fade-up">
                <button id="loadmorebtn">Show More</button>
            </div>
        </div>

        <?php include('Footer.php'); ?>

    </div>

    <!-- Slider Js -->
    <script>
        var counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 5) {
                counter = 1;
            }
        }, 3000);

    </script>
   
   <script src="../js/FadeUpAnimation.js"></script>

</body>

</html>