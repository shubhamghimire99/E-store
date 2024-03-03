<?php
include "src/user/navbar.php";
include "src/Database/connect.php";
$buyer_id = $_SESSION['user_id'];
$sql = "select * from user where id = '$buyer_id'";
$result = mysqli_query($conn, $sql);
$userdata = mysqli_fetch_assoc($result);

$order_details = "select * from orders where user_id = '$buyer_id'";
$order_result = mysqli_query($conn, $order_details);
$order_data = mysqli_fetch_all($order_result, MYSQLI_ASSOC);







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders</title>
    <link rel="stylesheet" href="/src/css/seller/profile.css">
    <link rel="stylesheet" href="/src/css/buyer/profile.css">
    <link rel="stylesheet" href="/src/css/buyer/order.css">
</head>

<body>
    <div class="container">


        <div class="wrapper">
            <div class="menubar">
                <h2>Manage my account</h2>
                <ul>
                    <li><a href="/user-profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2" />
                                    <path d="M4.271 18.346S6.5 15.5 12 15.5s7.73 2.846 7.73 2.846M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6" />
                                </g>
                            </svg>
                            Profile</a></li>
                    <li><a href="/address-book"><svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17 16l-.15-1.25q-.2-.075-.35-.162t-.3-.238l-1.15.5l-1-1.75l1-.75q-.05-.2-.05-.375t.05-.375l-1-.75l1.05-1.7l1.1.45q.15-.125.3-.2t.35-.15L17 8h2l.15 1.25q.2.075.35.15t.3.2l1.1-.45l1.05 1.7l-1 .75q.05.2.05.375t-.05.375l1 .75l-1 1.75l-1.15-.5q-.15.15-.3.237t-.35.163L19 16zm1-2.5q.65 0 1.075-.425T19.5 12q0-.65-.425-1.075T18 10.5q-.65 0-1.075.425T16.5 12q0 .65.425 1.075T18 13.5M5 23V1h14v6h-2V6H7v12h10v-1h2v6z" />
                            </svg>
                            Address Book</a></li>
                    <li class="active"> <a href="/order"><svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17 16l-.15-1.25q-.2-.075-.35-.162t-.3-.238l-1.15.5l-1-1.75l1-.75q-.05-.2-.05-.375t.05-.375l-1-.75l1.05-1.7l1.1.45q.15-.125.3-.2t.35-.15L17 8h2l.15 1.25q.2.075.35.15t.3.2l1.1-.45l1.05 1.7l-1 .75q.05.2.05.375t-.05.375l1 .75l-1 1.75l-1.15-.5q-.15.15-.3.237t-.35.163L19 16zm1-2.5q.65 0 1.075-.425T19.5 12q0-.65-.425-1.075T18 10.5q-.65 0-1.075.425T16.5 12q0 .65.425 1.075T18 13.5M5 23V1h14v6h-2V6H7v12h10v-1h2v6z" />
                            </svg>
                            Orders</a></li>
                </ul>
            </div>
            <div class="content">
                <h2>My Order</h1>
                    <hr>
                    <div class="orders">
                        <?php
                        $get_products =
                            "SELECT orders.*, product.*  FROM orders INNER JOIN 
                            product ON orders.product_id = product.product_id
                            WHERE orders.user_id = '$buyer_id'";
                        $products = $conn->query($get_products);
                        

                        if ($products->num_rows > 0) {
                            
                            // output data of each row
                            while ($row = $products->fetch_assoc()) {
                                $order_id = $row['order_id'];
                                if ($row['order_status'] == 'pending' || $row['order_status'] == 'delivered') {
                                    echo "<div class='order'>   
                                    <div class='order_details'>
                                    <h3>Cart ID: " . $row['cart_id'] . "</h3>
                                    
                                    <h3>Order Details</h3>


                                    <div class='order_info
                                    '>
                                        <div class='order_id'>
                                            <h4>Order ID</h4>
                                            <p>" . $row['order_id'] . "</p>
                                        </div>
                                        <div class='order_date
                                        '>
                                            <h4>Order Date</h4>
                                            <p>" . $row['order_date'] . "</p>
                                        </div>
                                        <div class='order_status'>
                                            <h4>Order Status</h4>
                                            <p>" . $row['order_status'] . "</p>
                                        </div>
                                        <div class='order_quantity'>
                                            <h4>Order Quantity:</h4>
                                            <p>" . $row['order_quantity'] . "</p>
                                        </div>    
                                    </div>
                                </div>

                                    <div class='product_details'>
                                    <h3>Product Details</h3>
                                    <div class='product_info'>
                                        <div class='product_image'>
                                            <img src='/src/images/" . $row['image'] . "' width='100px' height='100px' alt='Product Image'>
                                        </div>
                                        <div class='product_name'>
                                            <h4>Product Name</h4>
                                            <p>" . $row['title'] . "</p>
                                        </div>
                                        <div class='product_price'>
                                            <h4>Product Price</h4>
                                            <p>Rs. " . $row['price'] . "</p>
                                        </div>
                                        <div class='product_quantity'>
                                            <h4>Product Quantity</h4>
                                            <p></p>
                                        </div>
                                     
                                    </div>
                                </div>
                                <div class='payment_details'>
                                    <h3>Payment Details</h3>
                                    <div class='payment_info'>
                                        <div class='payment_method'>
                                            <h4>Payment Method</h4>
                                            <p>Khalti</p>
                                        </div>
                                        <div class='payment_status'>
                                            <h4>Payment Status</h4>
                                            <p>done</p>
                                        </div>
                                    </div>
                                </div>";
                                    if ($row['order_status'] == 'pending' ) {
                                        echo '<a href= "/order_status?order_id='.$row['order_id'].'&status=canceled">Cancel Order</a>';
                                    }

                                    
                                    // <button >Cancel Order</button>
                                    echo " </div
            >  ";
                                }
                            }
                        } else {
                            echo   "0 results";
                        }

                        ?>

                    </div>





            </div>

</body>

</html>