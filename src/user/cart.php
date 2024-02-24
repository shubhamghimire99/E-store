<?php
include 'src/user/navbar.php';
include 'src/database/connect.php';

// get all products form cart
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM cart where user_id = $user_id";
$result = mysqli_query($conn, $sql);
$cart_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
// get total amount
// $total = 0;
// foreach($products as $product){
//     $total += $product['product_price'];
// }
 
$total_price = 0;
// foreach ($cart_items as $cart_items) {
//     $total_price += $cart_items['product_total'];
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/buyer/cart.css">
    <title>Document</title>
</head>

<body>

    <div class="main">

        <div class="container">
            <div class="payment_details">
                <h1>Payment Information</h1>
                <div class="details_card">
                    <div class="name_address">
                        <div class="first_lastName">
                            <input type="text" placeholder="First Name" />
                            <input type="text" placeholder="Last Name" />
                        </div>
                        <div class="address">
                            <input type="text" onkeyup="change()" id="put" placeholder="Address" />
                            <input type="number" placeholder="Pincode" />
                            <input type="text" placeholder="Country" />
                        </div>
                    </div>
                    <h1>Shipping Details</h1>
                    <div class="shipping_card">
                        <div class="new_card">
                            <h4>Same as personal</h4>
                            <p id="output">Bharat House Bombay Samachar Road</p>
                            <p>400001</p>
                        </div>
                        <div class="add_savedcard">
                            <h4>Saved Address</h4>
                            <p>Lokhandwala Complex, Andheri (west)</p>
                            <p>400053</p>
                        </div>
                    </div>
                    <div class="proced_payment">
                        <a href="">Procced to payment</a>
                    </div>
                </div>
            </div>
            <div class="order_summary">
                <h1>Order Summary</h1>
                <div class="summary_card">
                    <?php foreach ($cart_items as $cart_items) : ?>
                        <div class="card_item">
                            <div class="product_img">
                                <img src="/src/images/<?php echo $cart_items['product_image']; 
                               
                                ?>" alt="image not found" />
                            </div>
                            <div class="product_info">
                                <h1><?php echo $cart_items['product_name']; ?></h1>
                                <!-- <p><?php echo $cart_items['product_des']; ?></p> -->
                                <button class="close-btn" onclick="deleteFromCart(<?php echo  $cart_items['cart_id']?>)">
                                    <i class="fa fa-close"></i>
                                </button>
                                <div class="product_rate_info">
                                    <h1>Rs. <?php echo $cart_items['product_price']; 
                                         $total_price +=  $cart_items['product_total'];
                                         
                                    ?></h1>
                                    <button onclick="subtractQuantity(<?php echo  $cart_items['cart_id']?>)" class="pqt-minus">-</button>
                                    <span class="pqt"><?php echo $cart_items['product_quantity']; ?></span>
                                    <button onclick="addQuantity(<?php echo  $cart_items['cart_id']?>)" class="pqt-plus">+</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="order_price">
                        <p>Order summary</p>

                        <h4>RS.<?php echo  $total_price ?></h4>
                    </div>
                    <div class="order_service">
                        <p>delivery Charge</p>
                        <h4>Rs.65</h4>
                    </div>
                    <div class="order_total">
                        <p>Total Amount</p>
                        <h4>Rs.<?php echo  $total_price + 65?></h4>
                    </div>

                </div>
            </div>
        </div>


        <?php include "src/user/Footer.php" ?>
    </div>

    <script src="/src/js/buyer/cart.js"></script>
</body>

</html>