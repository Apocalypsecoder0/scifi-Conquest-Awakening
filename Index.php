<?php
session_start();

// Include header
include 'includes/header.php';

// Determine which page to load
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'login':
        include 'pages/login.php';
        break;
    case 'register':
        include 'pages/register.php';
        break;
    default:
        include 'pages/home.php';
        break;
}

// Include footer
include 'includes/footer.php';
?>
