<?php
include "src/user/navbar.php";
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

        <?php if (isset($_SESSION['user_id'])) : ?>

            <?php
            include 'src/database/connect.php';

            $user_id = $_SESSION['user_id'];

            $sql = "SELECT * FROM cart where user_id = $user_id and cart_status = 'incart'";
            $result = mysqli_query($conn, $sql);
            $cart_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // calculate number of cart items
            $cart_count = mysqli_num_rows($result);

            $total_price = 0;

            $getuser = "SELECT firstname ,lastname FROM user WHERE id = $user_id";
            $users = mysqli_query($conn, $getuser);
            $users = mysqli_fetch_all($users, MYSQLI_ASSOC);
            // echo json_encode($users);

            $getaddress = "SELECT * FROM addressbook where user_id = $user_id";
            $address = mysqli_query($conn, $getaddress);
            $address = mysqli_fetch_all($address, MYSQLI_ASSOC);
            ?>
            <div class="container">
                <div class="payment_details">
                    <h1>Payment Information</h1>
                    <div class="details_card">
                        <div class="name_address">
                            <div class="first_lastName">
                                <?php

                                foreach ($users as $users) : ?>
                                    <input type="text" value="<?php echo $users['firstname'] ?>" />
                                    <input type="text" value="<?php echo $users['lastname'] ?>" />
                                <?php endforeach; ?>
                            </div>
                            <!-- <div class="address">

                            <input type="text" value="" placeholder="" />
                            <input type="text" placeholder="" />
                            <input type="text" placeholder="" />
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
                                    <?php echo $address['address_id'] ?>
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
                            <?php foreach ($cart_items as $cart_items) : ?>
                                <div class="card_item">
                                    <div class="product_img">
                                        <img src="/src/images/<?php echo $cart_items['product_image']; ?>" alt="image not found" />
                                    </div>
                                    <div class="product_info">
                                        <h1 id="product_name"><?php echo $cart_items['product_name']; ?></h1>
                                        <p id="product_id" hidden><?php echo $cart_items['product_id']; ?></p>
                                        <button class="close-btn" onclick="deleteFromCart(<?php echo  $cart_items['cart_id'] ?>)">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <div class="product_rate_info">
                                            <h1>Rs. <?php echo number_format($cart_items['product_price']);
                                                    $total_price +=  $cart_items['product_total'];


                                                    ?></h1>
                                            <button onclick="subtractQuantity(<?php echo  $cart_items['cart_id'] ?>)" class="pqt-minus">-</button>
                                            <span class="pqt"><?php echo $cart_items['product_quantity']; ?></span>
                                            <button onclick="addQuantity(<?php echo  $cart_items['cart_id'] ?>)" class="pqt-plus">+</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="order_price">
                            <p>Order summary</p>

                            <h4>RS.<?php echo  number_format($total_price) ?></h4>
                        </div>
                        <div class="order_service">
                            <p>delivery Charge</p>
                            <h4>Rs.65</h4>
                        </div>
                        <div class="order_total">
                            <p>Total Amount</p>
                            <h4 id="total-quantity">Rs.<?php echo  number_format($total_price + 65) ?></h4>
                        </div>

                        <!-- <button >Buy now</button> -->

                    </div>
                </div>
            </div>


            <?php include "src/user/Footer.php" ?>
        <?php else : ?>
            <!-- redirect to login -->
            <script>
                window.location.href = "/login";
            </script>
        <?php endif; ?>
    </div>
    <script>
        var name = document.getElementById("product_name").textContent;
        var id =document.getElementById("product_id").textContent;
        var url ="http://localhost:3000/cart?id="+id;
        var totalprice = parseFloat($('#total-quantity').text().replace('Rs.', '').replace(/,/g, ''));

        var message = "Error occured while processing payment. Please try again."

        function verifyPayment(payload) {
            $.ajax({
                url: "/payment-api",
                type: "POST",
                data: {token : payload['token']},
                success: function(response) {
                    if (response.success) {
                        console.log(response);
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred: " + error);
                }
            });
        }


        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_c6c15d2d463d4bdfb744141e7d28a761",
            "productIdentity": id,
            "productName": name,
            "productUrl": url,
            "paymentPreference": [
                "KHALTI"
            ],
            "eventHandler": {
                onSuccess(payload) {
                    // hit merchant api for initiating verfication 
                    // console.log(payload);               
                    verifyPayment(payload)
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function() {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({
                // amount: totalprice * 100
                amount: 1000
            });
        }

    </script>
    <script src="/src/js/buyer/cart.js"></script>
</body>

</html>