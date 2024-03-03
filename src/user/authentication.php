<?php
session_start();
// include "src/Database/Database.php";
if(!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit();
}

if($_SESSION['role'] != 'buyer') {
    echo "You don't have permission to access this page.";
    exit();
}