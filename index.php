<?php 


$routes = [
    "/" => "src/user/landingpage.php",
    "/createtable" => "src/Database/table.php",
    "/login" => "src/user/login.php",
    "/register" => "src/user/register.php",
    "/seller-register" => "src/seller/register.php",
    "/cart" => "src/user/cart.php",
    "/addtocart" => "src/user/addtocart.php",
    "/addquantity" => "src/user/addquantity.php",
    "/subtractquantity" => "src/user/subtractquantity.php",
    "/deleteFromCart" => "src/user/deleteFromCart.php",
    "/productdetails" => "src/user/product.php",
    "/show_products" => "src/user/show_products.php",
    "/notification" => "src/user/notification.php",
    "/admin" => "src/admin/seller.php",
    "/sellers" => "src/admin/seller.php",
    "/sellerverify" => "src/admin/verifyseller.php",
    "/deleteseller" => "src/admin/delete_record.php",
    "/seller-dashboard" => "src/seller/dashboard.php",
    "/seller-order" => "src/seller/orders.php",
    "/seller-product" => "src/seller/product.php",
    "/seller-inventory" => "src/seller/inventory.php",
    "/seller-payment" => "src/seller/payment.php",
    "/seller-setting" => "src/seller/settings.php",
    "/connect" => "src/Database/connect.php",
    "/verify" => "src/admin/verify.php",
    "/admin-seller" => "src/admin/seller.php",
    "/unverifyseller"=> "src/admin/unverify.php",
    "/seller-edit-product"=> "src/seller/edit_product.php",
    "/seller-delete-product"=> "src/seller/delete_product.php",
    "/productApi" => "src/user/product_api.php",
    "/logout" => "src/Database/logout.php",
    "/seller-profile" => "src/seller/profile.php",
    "/seller-setup" => "src/seller/setup.php",
    "/seller-update" => "src/seller/setup-update.php",
    "/user-profile" => "src/user/profile.php",
    "/user-settings" => "src/user/settings.php",
    "/search" => "src/user/search.php",
    "/navsearch" => "src/user/navsearch.php",
    "/user-update" => "src/user/update.php",
    "/address-book" => "src/user/addressBook.php",
    "/addAddress" => "src/user/addAddress.php",
    "/editAddress" => "src/user/editaddress.php",
    "/deleteAddress" => "src/user/deleteaddress.php",
    "/order" => "src/user/order.php",
    "/buynow" => "src/user/buysingleproduct.php",
    "/buyNow" => "src/user/buyNOW.php",
    "/buy" => "src/user/buyfromcart.php",
    "/status" => "src/admin/status.php",
    "/order_status" => "src/user/status.php",
    "/seller_status" => "src/seller/status.php",
    "/filter" => "src/user/categoryfilter.php",
    "/filter_products" => "src/user/filter_products.php",
    "/get_order_notification" => "src/user/get_order_notification.php",
    "/get_cart_notification" => "src/user/get_cart_notification.php",
    "/get_product_notification" => "src/user/get_product_notification.php",
    "/get_seller_notification" => "src/user/get_seller_notification.php",
    "/mail" => "src/Mail/mail.php",
    "/payment-api" => "src/user/paymentapi.php",
    "/get_seller_details" => "src/admin/getsellerdetails.php",
];

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    include 'views/404.php';
    http_response_code(404);
}
