<?php 


$routes = [
    "/" => "src/user/landingpage.php",
    "/login" => "src/user/login.php",
    "/register" => "src/user/register.php",
    "/seller-register" => "src/seller/register.php",
    "/cart" => "src/user/cart.php",
    "/productdetails" => "src/user/product.php",
    "/notification" => "src/user/notification.php",
    "/admin" => "src/admin/dashboard.php",
    "/sellers" => "src/admin/seller.php",
    "/sellerverify" => "src/admin/verifyseller.php",
    "/deleteseller" => "src/admin/delete_record.php",

    
];

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    include 'views/404.php';
    http_response_code(404);
}
?>