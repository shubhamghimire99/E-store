<!-- dasboard for seller -->

<?php
include "src/seller/authentication.php";
include "src/Database/connect.php";
$seller_id = $_SESSION['user_id'];

$sql = "select seller_status from user where id = '$seller_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['seller_status'] == 'disabled') {
    echo "<script>";
    echo " alert('You have been restricted from accessing this page due to violation of our terms and conditions. Please contact the admin for more information.');";
    echo "window.location.href = '/logout'";
    echo "</script>";
}

$getproductid = "SELECT  product_id, order_quantity FROM orders Where seller_id = '$seller_id' AND order_status = 'delivered'";
$productdetail = mysqli_query($conn, $getproductid);
$productdetail = mysqli_fetch_all($productdetail, MYSQLI_ASSOC);
$totalSales = 0;

// calculate total sales
foreach ($productdetail as $product) {
    $product_id = $product['product_id'];
    $order_quantity = $product['order_quantity'];
    $getproduct = "SELECT price FROM product Where product_id = '$product_id'";
    $product = mysqli_query($conn, $getproduct);
    $product = mysqli_fetch_assoc($product);
    $price = $product['price'];
    $totalSales += $price * $order_quantity;
}

// get total numbers of products and total numbers of orders
$getproduct = "SELECT COUNT(product_id) as totalproduct FROM product Where user_id = '$seller_id' AND product_status = 'active'";
$product = mysqli_query($conn, $getproduct);
$product = mysqli_fetch_assoc($product);
$totalproduct = $product['totalproduct'];

$getorder = "SELECT COUNT(order_id) as totalorder FROM orders Where seller_id = '$seller_id' AND order_status = 'delivered'";
$order = mysqli_query($conn, $getorder);
$order = mysqli_fetch_assoc($order);
$totalorder = $order['totalorder'];

// get total pending orders
$getpendingorder = "SELECT COUNT(order_id) as totalpendingorder FROM orders Where seller_id = '$seller_id' AND order_status = 'pending'";
$pendingorder = mysqli_query($conn, $getpendingorder);
$pendingorder = mysqli_fetch_assoc($pendingorder);
$totalpendingorder = $pendingorder['totalpendingorder'];

// get recent orders max 6 and get customer name form user table
$getrecentorder = "SELECT * FROM orders Where seller_id = '$seller_id'  ORDER BY order_date DESC LIMIT 6";
$recentorder = mysqli_query($conn, $getrecentorder);
$recentorders = mysqli_fetch_all($recentorder, MYSQLI_ASSOC);

// get each orders customer name
foreach ($recentorder as $order) {
    $product_id = $order['product_id'];
    $user_id = $order['user_id'];
    $getcustomername = "SELECT firstname, lastname FROM user Where id = '$user_id'";
    $customername = mysqli_query($conn, $getcustomername);
    $customername = mysqli_fetch_all($customername, MYSQLI_ASSOC);
    $order_id = $order['order_id'];
    $order_date = $order['order_date'];
    $order_status = $order['order_status'];
    $order_quantity = $order['order_quantity'];
    $getproductprice = "SELECT price FROM product Where product_id = '$product_id'";
    $productprice = mysqli_query($conn, $getproductprice);
    $productprice = mysqli_fetch_all($productprice, MYSQLI_ASSOC);
    $order_price = $productprice[0]['price'] * $order_quantity;
    $customername = $customername[0]['firstname'] . " " . $customername[0]['lastname'];
    $orderdetail[] = array('order_id' => $order_id, 'order_date' => $order_date, 'order_status' => $order_status, 'order_quantity' => $order_quantity, 'order_price' => $order_price, 'customername' => $customername);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="/src/css/seller/dashboard.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        .content {
            width: 80%;
            height: auto;
            background-color: #F8F7FC;
            display: flex;
            justify-content: center;
            align-items: center;
            /* flex-direction: column; */
        }

        .wrapper {
            height: 100%;
            width: 90%;
            background-color: #F8F7FC;
            border: 5px solid #FFFFFF;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .first {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            padding: 20px;
            gap: 20px;
        }

        .card {
            width: 30%;
            height: 200px;
            padding: 20px;
            /* text-align: center; */
            background-color: #FFFFFF;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card p {
            font-size: 16px;
            font-weight: 500;
            color: #000000;
            margin-bottom: 15px;
        }

        .card h1 {
            font-size: 30px;
            font-weight: 700;
            color: #000000;
            font-family: 'poppins', sans-serif;
            padding: 20px;
        }

        .second {
            height: 100%;
            width: 100%;
            padding: 20px 40px;
            height: 330px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .detail {
            /* height: 100%; */
            width: 100%;
            background-color: #FFFFFF;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }


        .detail p {
            font-size: 16px;
            font-weight: 800;
            color: #000000;
            margin-bottom: 15px;
        }

        .detail .inner {
            display: flex;
            justify-content: space-between;
            /* align-items: center; */
        }

        .inner a {
            font-size: 16px;
            font-weight: 700;
            color: #3751FF;
            text-decoration: none;
        }

        .table {
            padding: 20px 0;
            width: 100%;
            height: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;

        }

        td {
            padding: 10px 0;
            text-align: center;
            border-bottom: 1px solid #A7B7DD;
        }
    </style>
</head>

<body>
    <div class="menubar">
        <div class="logo">
            <svg width="138" height="35" viewBox="0 0 158 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M52.3361 23.25V27.225H64.8111V30H49.0111V13.825H64.7861V16.6H52.3361V20.625H62.5361V23.25H52.3361ZM67.7384 22H76.0884V24.45H67.7384V22ZM78.9419 24.55H82.3169C82.3836 25.1167 82.6419 25.6333 83.0919 26.1C83.5586 26.55 84.1669 26.9083 84.9169 27.175C85.6669 27.425 86.5086 27.55 87.4419 27.55C88.2919 27.55 88.9919 27.4583 89.5419 27.275C90.0919 27.0917 90.5003 26.8333 90.7669 26.5C91.0336 26.1667 91.1669 25.7667 91.1669 25.3C91.1669 24.85 91.0003 24.5083 90.6669 24.275C90.3336 24.025 89.8086 23.825 89.0919 23.675C88.3753 23.5083 87.4336 23.3417 86.2669 23.175C85.3503 23.0417 84.4836 22.8583 83.6669 22.625C82.8503 22.375 82.1253 22.0583 81.4919 21.675C80.8753 21.2917 80.3836 20.825 80.0169 20.275C79.6669 19.7083 79.4919 19.0417 79.4919 18.275C79.4919 17.325 79.7586 16.4917 80.2919 15.775C80.8419 15.0583 81.6503 14.5 82.7169 14.1C83.7836 13.7 85.0919 13.5 86.6419 13.5C88.9753 13.5 90.7669 14 92.0169 15C93.2836 15.9833 93.9003 17.3417 93.8669 19.075H90.6169C90.5503 18.0917 90.1336 17.3833 89.3669 16.95C88.6169 16.5167 87.6669 16.3 86.5169 16.3C85.4503 16.3 84.5669 16.4583 83.8669 16.775C83.1836 17.0917 82.8419 17.6333 82.8419 18.4C82.8419 18.7 82.9253 18.9667 83.0919 19.2C83.2586 19.4167 83.5419 19.6083 83.9419 19.775C84.3419 19.9417 84.8836 20.1 85.5669 20.25C86.2503 20.4 87.1003 20.55 88.1169 20.7C89.0669 20.8333 89.9253 21.0167 90.6919 21.25C91.4753 21.4667 92.1419 21.7583 92.6919 22.125C93.2586 22.475 93.6919 22.925 93.9919 23.475C94.2919 24.025 94.4419 24.7 94.4419 25.5C94.4419 26.4833 94.1836 27.3417 93.6669 28.075C93.1669 28.7917 92.3836 29.35 91.3169 29.75C90.2669 30.15 88.9003 30.35 87.2169 30.35C86.0169 30.35 84.9586 30.225 84.0419 29.975C83.1253 29.7083 82.3336 29.3583 81.6669 28.925C81.0003 28.4917 80.4586 28.0167 80.0419 27.5C79.6253 26.9833 79.3253 26.4667 79.1419 25.95C78.9753 25.4333 78.9086 24.9667 78.9419 24.55ZM96.0753 17.575H105.725V20.1H96.0753V17.575ZM99.2753 14.175H102.525V30H99.2753V14.175ZM114.944 30.3C113.378 30.3 111.994 30.05 110.794 29.55C109.611 29.05 108.686 28.325 108.019 27.375C107.353 26.4083 107.019 25.225 107.019 23.825C107.019 22.425 107.353 21.2417 108.019 20.275C108.686 19.2917 109.611 18.55 110.794 18.05C111.994 17.55 113.378 17.3 114.944 17.3C116.511 17.3 117.878 17.55 119.044 18.05C120.228 18.55 121.153 19.2917 121.819 20.275C122.486 21.2417 122.819 22.425 122.819 23.825C122.819 25.225 122.486 26.4083 121.819 27.375C121.153 28.325 120.228 29.05 119.044 29.55C117.878 30.05 116.511 30.3 114.944 30.3ZM114.944 27.8C115.811 27.8 116.586 27.65 117.269 27.35C117.969 27.0333 118.519 26.5833 118.919 26C119.319 25.4 119.519 24.675 119.519 23.825C119.519 22.975 119.319 22.25 118.919 21.65C118.519 21.0333 117.978 20.5667 117.294 20.25C116.611 19.9333 115.828 19.775 114.944 19.775C114.078 19.775 113.294 19.9333 112.594 20.25C111.894 20.5667 111.336 21.025 110.919 21.625C110.519 22.225 110.319 22.9583 110.319 23.825C110.319 24.675 110.519 25.4 110.919 26C111.319 26.5833 111.869 27.0333 112.569 27.35C113.269 27.65 114.061 27.8 114.944 27.8ZM125.222 17.575H128.472V30H125.222V17.575ZM133.247 20.25C132.313 20.25 131.505 20.4333 130.822 20.8C130.138 21.15 129.588 21.5833 129.172 22.1C128.755 22.6167 128.463 23.1167 128.297 23.6L128.272 22.225C128.288 22.025 128.355 21.7333 128.472 21.35C128.588 20.95 128.763 20.525 128.997 20.075C129.23 19.6083 129.538 19.1667 129.922 18.75C130.305 18.3167 130.772 17.9667 131.322 17.7C131.872 17.4333 132.513 17.3 133.247 17.3V20.25ZM146.581 25.875H149.731C149.598 26.725 149.239 27.4833 148.656 28.15C148.089 28.8167 147.314 29.3417 146.331 29.725C145.348 30.1083 144.148 30.3 142.731 30.3C141.148 30.3 139.748 30.05 138.531 29.55C137.314 29.0333 136.364 28.2917 135.681 27.325C134.998 26.3583 134.656 25.1917 134.656 23.825C134.656 22.4583 134.989 21.2917 135.656 20.325C136.323 19.3417 137.248 18.5917 138.431 18.075C139.631 17.5583 141.031 17.3 142.631 17.3C144.264 17.3 145.623 17.5583 146.706 18.075C147.789 18.5917 148.589 19.375 149.106 20.425C149.639 21.4583 149.864 22.7833 149.781 24.4H137.931C138.014 25.0333 138.248 25.6083 138.631 26.125C139.031 26.6417 139.564 27.05 140.231 27.35C140.914 27.65 141.723 27.8 142.656 27.8C143.689 27.8 144.548 27.625 145.231 27.275C145.931 26.9083 146.381 26.4417 146.581 25.875ZM142.481 19.775C141.281 19.775 140.306 20.0417 139.556 20.575C138.806 21.0917 138.323 21.7333 138.106 22.5H146.556C146.473 21.6667 146.073 21.0083 145.356 20.525C144.656 20.025 143.698 19.775 142.481 19.775Z" fill="black" />
                <path d="M19.8369 3.98163V19L15.536 17.0441C7.89965 13.5515 3.15985 7.05515 3.15985 0H0V17.1838C0 22.7721 4.0376 27.9412 10.4451 30.386L19.9247 34.0184V19L24.2256 20.9559C31.8619 24.4485 36.6017 30.9449 36.6017 38H39.7616V20.8162C39.7616 15.2279 35.724 10.0588 29.3165 7.61397L19.8369 3.98163Z" fill="black" />
            </svg>
        </div>
        <nav>
            <ul>
                <li class="active"><a href="/seller-dashboard"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 10H7C7.55 10 8 9.55 8 9V1C8 0.45 7.55 0 7 0H1C0.45 0 0 0.45 0 1V9C0 9.55 0.45 10 1 10ZM1 18H7C7.55 18 8 17.55 8 17V13C8 12.45 7.55 12 7 12H1C0.45 12 0 12.45 0 13V17C0 17.55 0.45 18 1 18ZM11 18H17C17.55 18 18 17.55 18 17V9C18 8.45 17.55 8 17 8H11C10.45 8 10 8.45 10 9V17C10 17.55 10.45 18 11 18ZM10 1V5C10 5.55 10.45 6 11 6H17C17.55 6 18 5.55 18 5V1C18 0.45 17.55 0 17 0H11C10.45 0 10 0.45 10 1Z" fill="#A7B7DD" />
                        </svg>Dashboard</a></li>
                <li><a href="/seller-order"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 16C4.9 16 4.01 16.9 4.01 18C4.01 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16ZM0 1C0 1.55 0.45 2 1 2H2L5.6 9.59L4.25 12.03C3.52 13.37 4.48 15 6 15H17C17.55 15 18 14.55 18 14C18 13.45 17.55 13 17 13H6L7.1 11H14.55C15.3 11 15.96 10.59 16.3 9.97L19.88 3.48C19.9643 3.32843 20.0075 3.15747 20.0054 2.98406C20.0034 2.81064 19.956 2.64077 19.8681 2.49126C19.7803 2.34175 19.6549 2.21778 19.5043 2.13162C19.3538 2.04546 19.1834 2.00009 19.01 2H4.21L3.54 0.570001C3.45963 0.399307 3.3323 0.255042 3.17291 0.154095C3.01352 0.0531475 2.82867 -0.000302861 2.64 1.29085e-06H1C0.45 1.29085e-06 0 0.450001 0 1ZM16 16C14.9 16 14.01 16.9 14.01 18C14.01 19.1 14.9 20 16 20C17.1 20 18 19.1 18 18C18 16.9 17.1 16 16 16Z" fill="#A7B7DD" />
                        </svg>
                        Orders</a></li>
                <li><a href="/seller-product"><svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 4H12C12 1.79 10.21 0 8 0C5.79 0 4 1.79 4 4H2C0.9 4 0 4.9 0 6V18C0 19.1 0.9 20 2 20H14C15.1 20 16 19.1 16 18V6C16 4.9 15.1 4 14 4ZM6 8C6 8.55 5.55 9 5 9C4.45 9 4 8.55 4 8V6H6V8ZM8 2C9.1 2 10 2.9 10 4H6C6 2.9 6.9 2 8 2ZM12 8C12 8.55 11.55 9 11 9C10.45 9 10 8.55 10 8V6H12V8Z" fill="#A7B7DD" />
                        </svg>Product
                    </a></li>
                <li>
                    <a href="/seller-inventory"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.1916 5.13895L4.08961 7.18995L12.73 11.8701L16.8319 9.81914L8.1916 5.13895ZM2.96558 8.28701V17.2155C2.96558 17.4996 3.12608 17.7593 3.38017 17.8863L11.9655 22.179V13.162L2.96558 8.28701ZM13.4655 22.1791L22.051 17.8863C22.3051 17.7593 22.4656 17.4996 22.4656 17.2155V8.67937L18.9655 10.4294V13.2156C18.9655 13.6298 18.6297 13.9656 18.2155 13.9656C17.8013 13.9656 17.4655 13.6298 17.4655 13.2156V11.1794L13.4655 13.1794V22.1791ZM21.7159 7.37714L13.051 3.04467C12.8398 2.9391 12.5913 2.9391 12.3802 3.04467L9.82928 4.32011L18.4696 9.0003L21.7159 7.37714Z" fill="#A7B7DD" />
                        </svg>
                        Inventory</a>
                </li>
                <li><a href="/seller-payment"><svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 0H2C0.89 0 0.00999999 0.89 0.00999999 2L0 14C0 15.11 0.89 16 2 16H18C19.11 16 20 15.11 20 14V2C20 0.89 19.11 0 18 0ZM18 14H2V8H18V14ZM18 4H2V2H18V4Z" fill="#A7B7DD" />
                        </svg>
                        Payment</a></li>
                <li><a href="/seller-profile"><svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.4783 10.94C16.5183 10.64 16.5383 10.33 16.5383 10C16.5383 9.68003 16.5183 9.36003 16.4683 9.06003L18.4983 7.48003C18.5858 7.40793 18.6456 7.30772 18.6675 7.19649C18.6894 7.08527 18.672 6.96989 18.6183 6.87003L16.6983 3.55003C16.6418 3.44959 16.5516 3.3724 16.4436 3.33214C16.3356 3.29187 16.2168 3.29112 16.1083 3.33003L13.7183 4.29003C13.2183 3.91003 12.6883 3.59003 12.0983 3.35003L11.7383 0.810027C11.7206 0.695557 11.6625 0.591234 11.5744 0.516003C11.4863 0.440772 11.3742 0.399623 11.2583 0.400027H7.41834C7.17834 0.400027 6.98834 0.570027 6.94834 0.810027L6.58834 3.35003C5.99834 3.59003 5.45834 3.92003 4.96834 4.29003L2.57834 3.33003C2.35834 3.25003 2.10834 3.33003 1.98834 3.55003L0.078343 6.87003C-0.0416569 7.08003 -0.00165707 7.34003 0.198343 7.48003L2.22834 9.06003C2.17834 9.36003 2.13834 9.69003 2.13834 10C2.13834 10.31 2.15834 10.64 2.20834 10.94L0.178343 12.52C0.0908669 12.5921 0.0310966 12.6923 0.00921549 12.8036C-0.0126656 12.9148 0.00469628 13.0302 0.0583431 13.13L1.97834 16.45C2.09834 16.67 2.34834 16.74 2.56834 16.67L4.95834 15.71C5.45834 16.09 5.98834 16.41 6.57834 16.65L6.93834 19.19C6.98834 19.43 7.17834 19.6 7.41834 19.6H11.2583C11.4983 19.6 11.6983 19.43 11.7283 19.19L12.0883 16.65C12.6783 16.41 13.2183 16.09 13.7083 15.71L16.0983 16.67C16.3183 16.75 16.5683 16.67 16.6883 16.45L18.6083 13.13C18.7283 12.91 18.6783 12.66 18.4883 12.52L16.4783 10.94ZM9.33834 13.6C7.35834 13.6 5.73834 11.98 5.73834 10C5.73834 8.02003 7.35834 6.40003 9.33834 6.40003C11.3183 6.40003 12.9383 8.02003 12.9383 10C12.9383 11.98 11.3183 13.6 9.33834 13.6Z" fill="#A7B7DD" />
                        </svg>
                        profile</a></li>
                <li>
                    <a href="/logout">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.91625 14.7756C6.91625 15.0258 6.81689 15.2656 6.64002 15.4425C6.46315 15.6194 6.22326 15.7188 5.97313 15.7188H1.57188C1.15499 15.7188 0.755175 15.5531 0.460392 15.2584C0.165608 14.9636 0 14.5638 0 14.1469V1.57188C0 1.15499 0.165608 0.755175 0.460392 0.460392C0.755175 0.165608 1.15499 0 1.57188 0H5.97313C6.22326 0 6.46315 0.0993647 6.64002 0.276235C6.81689 0.453105 6.91625 0.692993 6.91625 0.943125C6.91625 1.19326 6.81689 1.43314 6.64002 1.61002C6.46315 1.78689 6.22326 1.88625 5.97313 1.88625H1.88625V13.8325H5.97313C6.22326 13.8325 6.46315 13.9319 6.64002 14.1087C6.81689 14.2856 6.91625 14.5255 6.91625 14.7756ZM15.4429 7.19211L12.2991 4.04836C12.122 3.87119 11.8817 3.77165 11.6311 3.77165C11.3805 3.77165 11.1402 3.87119 10.963 4.04836C10.7859 4.22554 10.6863 4.46584 10.6863 4.71641C10.6863 4.96698 10.7859 5.20728 10.963 5.38446L12.4964 6.91625H5.97313C5.72299 6.91625 5.48311 7.01561 5.30623 7.19248C5.12936 7.36936 5.03 7.60924 5.03 7.85938C5.03 8.10951 5.12936 8.34939 5.30623 8.52626C5.48311 8.70313 5.72299 8.8025 5.97313 8.8025H12.4964L10.9623 10.3359C10.7851 10.513 10.6855 10.7533 10.6855 11.0039C10.6855 11.2545 10.7851 11.4948 10.9623 11.672C11.1394 11.8491 11.3797 11.9487 11.6303 11.9487C11.8809 11.9487 12.1212 11.8491 12.2984 11.672L15.4421 8.52821C15.5301 8.44064 15.5999 8.33657 15.6476 8.22196C15.6952 8.10735 15.7198 7.98445 15.7199 7.86032C15.72 7.73619 15.6955 7.61327 15.648 7.49861C15.6005 7.38394 15.5308 7.27979 15.4429 7.19211Z" fill="#A7B7DD" />
                        </svg>

                        logout
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <div class="wrapper">
            <div class="first">
                <div class="card" id="card-1">
                    <p>Total Sales</p>
                    <h1 id="totalSales">
                        0.00
                        <?php
                        // $price = $totalSales;
                        // $formattedprice = number_format($price, 2);
                        // echo  $formattedprice;
                        ?>
                    </h1>
                </div>
                <div class="card">
                    <p>Pending Orders</p>
                    <h1 id="pendingOrders"> 0</h1>
                </div>
                <div class="card">
                    <p>Delivered Orders</p>
                    <h1 id="deliveredOrders">0</h1>
                </div>
                <div class="card">
                    <p>Total Items</p>
                    <h1 id="totalItems">0</h1>
                </div>
            </div>
            <div class="second">
                <div class="detail">
                    <div class="inner">
                        <p>Recent activity</p>
                        <a href="/seller-order">View all</a>
                    </div>
                    <div class="table">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                <?php foreach ($orderdetail as $order ) : ?>

                                    <tr>
                                        <td><?php echo $order['order_id'] ?></td>
                                        <td><?php echo $order['customername'] ?></td>
                                        <td> <?php echo $order['order_quantity'] ?> </td>
                                        <td>
                                            <?php
                                            $price = $order['order_price'];
                                            $formattedprice = number_format($price, 2);
                                            echo $formattedprice;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $dateString = $order['order_date'];
                                            $date = new DateTime($dateString);
                                            $formattedDate = $date->format("F j, Y , g:i a");
                                            echo $formattedDate
                                            ?>
                                        </td>
                                        <td><?php echo $order['order_status'] ?></td>
                                    </tr>

                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
// Function to animate counting
function animateCount(finalValue, elementId, duration) {
    var element = document.getElementById(elementId);
    var startTime = Date.now();
    var startValue = parseFloat(element.textContent.replace(/,/g, '')); // Remove commas from the text content
    var increment = (finalValue - startValue) / duration;

    function update() {
        var elapsedTime = Date.now() - startTime;
        if (elapsedTime < duration) {
            var newValue = startValue + (increment * elapsedTime);
            element.textContent = newValue.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}); // Display with commas and 2 decimal places
            requestAnimationFrame(update);
        } else {
            element.textContent = finalValue.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}); // Display final value with commas and 2 decimal places
        }
    }

    update();
}

// Call the animateCount function to animate the total sales number
animateCount(<?php echo $totalSales; ?>, 'totalSales', 2000); // Adjust duration as needed
animateCount(<?php echo $totalorder; ?>, 'deliveredOrders', 2000); // Adjust duration as needed
animateCount(<?php echo $totalpendingorder; ?>, 'pendingOrders', 2000); // Adjust duration as needed
animateCount(<?php echo $totalproduct; ?>, 'totalItems', 2000); // Adjust duration as needed

</script>

</html>