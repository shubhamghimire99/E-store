<?php
include "src/user/navbar.php";
require 'src/Database/connect.php';
// get user id
$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($conn, $_GET['id']);

    $getProducts = "SELECT * FROM product WHERE product_id='$product_id'";

    $products = mysqli_query($conn, $getProducts);
    $product = mysqli_fetch_all($products, MYSQLI_ASSOC);

    $getuser = "SELECT firstname ,lastname FROM user WHERE id = $user_id";
    $users = mysqli_query($conn, $getuser);
    $users = mysqli_fetch_all($users, MYSQLI_ASSOC);

    $getaddress = "SELECT * FROM addressbook where user_id = $user_id";
    $address = mysqli_query($conn, $getaddress);
    $address = mysqli_fetch_all($address, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/buyer/cart.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <title>Cart</title>
</head>

<body>
    <div class="main">

        <div class="container">
            <div class="payment_details">
                <h1>Payment Information</h1>
                <div class="details_card">
                    <div class="name_address">
                        <div class="first_lastName">
                            <?php foreach ($users as $users) : ?>
                                <input type="text" value="<?php echo $users['firstname'] ?>" />
                                <input type="text" value="<?php echo $users['lastname'] ?>" />
                            <?php endforeach; ?>
                        </div>
                        <!-- <div class="address">
                           
                            <input type="text" value="<?php echo $address['province'] ?>"  />
                            <input type="text"   value="<?php echo $address['city'] ?>"/>
                            <input type="text"  value="<?php echo $address['area'] ?>" />
                            <input type="text"  value="<?php echo $address['address'] ?>" />
                            <input type="text"  value="<?php echo $address['Landmark'] ?>" />
                      
                        </div> -->
                    </div>
                    <h1>Shipping Details</h1>
                    <div class="shipping_card">
                        <?php foreach ($address as $address) : ?>
                            <!-- <div class="new_card">
                                <h4><?php echo $address["address_id"]; ?></h4>
                                <p id="output"></p>
                                <p>400001</p>
                            </div> -->
                            <!-- add it in radio with id of address -->

                            <div class="add_savedcard" method="post">

                                <input type="radio" name="address_id" value="<?php echo $address['address_id'] ?>">
                                <h4>Saved Address</h4>
                                <p><?php echo $address['phone'] ?></p>
                                <p><?php echo $address['province'] . ', ' . $address['city']  . ', ' . $address['area']  ?></p>
                                <p><?php echo $address['address'] . ', ' . $address['Landmark'] ?></p>
                                </input>

                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="proced_payment">
                        <!-- get address id from the selected radio -->

                        <button name="submit" id="payment-button">Pay with Khalti</button>
                    </div>
                </div>

            </div>
            <div class="order_summary">
                <h1>Order Summary</h1>
                <div class="summary_card">
                    <div class="scrollable-container">
                        <?php foreach ($product as $product) : ?>
                            <div class="card_item">
                                <div class="product_img">
                                    <img src="/src/images/<?php echo $product['image']; ?>" alt="image not found" />
                                </div>
                                <div class="product_info">
                                    <h1><?php echo $product['title']; ?></h1>

                                    <!-- <p><?php echo $product['product_des']; ?></p> -->
                                    <!-- <button class="close-btn" onclick="deleteFromCart(<?php echo  $cart_items['cart_id'] ?>)">
                                        <i class="fa fa-close"></i>
                                    </button> -->
                                    <div class="product_rate_info">
                                        <h1>Rs. <?php echo number_format($product['price'])
                                                // $total_price +=  $product['price'];


                                                ?></h1>
                                        <!-- <button onclick="subtractQuantity(<?php echo  $cart_items['cart_id'] ?>)" class="pqt-minus">-</button> -->
                                        <!-- <span class="pqt"><?php echo $product['quantity']; ?></span> -->
                                        <!-- <button onclick="addQuantity(<?php echo  $cart_items['cart_id'] ?>)" class="pqt-plus">+</button> -->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="order_price">
                        <p>Order summary</p>

                        <h4>RS.<?php echo  number_format($product['price']) ?></h4>
                    </div>
                    <div class="order_service">
                        <p>delivery Charge</p>
                        <h4>Rs.65</h4>
                    </div>
                    <div class="order_total">
                        <p>Total Amount</p>
                        <h4>Rs.<?php echo  number_format($product['price'] + 65) ?></h4>
                    </div>

                    <!-- <button >Buy now</button> -->

                </div>
            </div>
        </div>



        <?php include "src/user/Footer.php" ?>
    </div>

    <!-- <script src="/src/js/buyer/cart.js"></script> -->

    <script>
        // $(document).ready(function() {
        //     $("#submitBtn").click(function() {
        //         var addressId = $("input[name='address_id']:checked").val();
        //         var productId = <?php echo $product['product_id'] ?>;

        //         $.ajax({
        //             type: "POST",
        //             url: "/buyNow",
        //             data: {
        //                 address_id: addressId,
        //                 product_Id : productId
        //             },
        //             success: function(response) {
        //                 alert("Order placed successfully");
        //                 window.location.href = "/order";
        //             }
        //         });
        //     });
        // });

        // $(document).ready(function() {
        //     // if the user selects an address then the field will be filled with the selected address
        //     $("input[name='address_id']").click(function() {
        //         var addressId = $("input[name='address_id']:checked").val();





        //     });

        // });
    </script>
    <script src="/src//js/buyer/khalti.js"></script>
</body>

</html>




?>