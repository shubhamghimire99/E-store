<?php 


$routes = [
    "/" => "src/user/landingpage.php",
    "/login" => "src/user/login.php",
    "/register" => "src/user/register.php",
    "/seller-register" => "src/seller/register.php",
    "/cart" => "src/user/cart.php",
    "/addtocart" => "src/user/addtocart.php",
    "/deleteFromCart" => "src/user/deleteFromCart.php",
    "/productdetails" => "src/user/product.php",
    "/show_products" => "src/user/show_products.php",
    "/notification" => "src/user/notification.php",
    "/admin" => "src/admin/dashboard.php",
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
    "/inventory" => "src/seller/inventory.php",
    "/verify" => "src/admin/verify.php",
    "/seller-edit-product"=> "src/seller/edit_product.php",
    "/seller-delete-product"=> "src/seller/delete_product.php",
    "/productApi" => "src/user/product_api.php",
    "/logout" => "src/Database/logout.php",
    "/seller-profile" => "src/seller/profile.php",
    "/seller-setup" => "src/seller/setup.php",
];

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    include 'views/404.php';
    http_response_code(404);
}
?>