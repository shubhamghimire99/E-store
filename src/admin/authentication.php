<?php
session_start();
// include 'src/Database/connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit();
}

if ($_SESSION['role'] != 'admin') {
    echo "You don't have permission to access admin page. Please contact admin for more information.";
    exit();
}
