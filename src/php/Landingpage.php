<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/landingpage.css">
    <title>Home</title>

</head>

<body>
    <div class="main">
        <?php include 'Navbar.php'; ?>
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
                    <img src="../images/1.jpg" alt="">
                </div>
                <!-- <div class="slide">
                    <img src="../images/2.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="../images/3.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="../images/4.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="../images/5.jpg" alt="">
                </div> -->
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
                        <img class="product-img" src="../images/download.jpg" alt="image can't be loaded">
                        <span>Fashion</span>
                    </a>
                </div>
                <div class="product">
                    <a href="">
                        <img class="product-img" src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                        <span>Shoes</span>
                    </a>
                </div>
            </div>

        </div>

        <div class="cards">
            <h1>Our Products</h1>
            <div class="product-card">
                <div class="card">
                    <div class="card-image">
                        <img src="../images/maksim-larin-NOpsC3nWTzY-unsplash.jpg" alt="image can't be loaded">
                    </div>

                    <div class="card-desc">
                        <h1>Product Name</h1>
                        <p>Description </p>
                        <span>Rs.2387652398</span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">

                    </div>

                    <div class="card-desc">

                    </div>
                </div>
                <div class="card">
                    <div class="card-image">

                    </div>

                    <div class="card-desc">

                    </div>
                </div>
                <div class="card">
                    <div class="card-image">

                    </div>

                    <div class="card-desc">

                    </div>
                </div>
                <div class="card">
                    <div class="card-image">

                    </div>

                    <div class="card-desc">

                    </div>
                </div>
                <div class="card">
                    <div class="card-image">

                    </div>

                    <div class="card-desc">

                    </div>
                </div>
                <div class="card">
                    <div class="card-image">

                    </div>

                    <div class="card-desc">

                    </div>
                </div>
                <div class="card">
                    <div class="card-image">

                    </div>

                    <div class="card-desc">

                    </div>
                </div>
                <div class="card">
                    <div class="card-image">

                    </div>

                    <div class="card-desc">

                    </div>
                </div>
                <div class="card">
                    <div class="card-image">

                    </div>

                    <div class="card-desc">

                    </div>
                </div>

            </div>

            <div class="btn fade-up">
                <button>Show More</button>
            </div>

        </div>

        <?php include('Footer.php'); ?>

    </div>


    <script src="../js/landingpage.js"></script>

</body>

</html>