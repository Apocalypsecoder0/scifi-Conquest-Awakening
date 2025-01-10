<?php
// Start the session
session_start();

// Load configuration settings
require_once 'config.php';

// Autoload classes
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

// Initialize the game engine
$gameEngine = new GameEngine();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Load the main game interface
    include 'templates/game_interface.php';
} else {
    // Load the login page
    include 'templates/login.php';
}
<?php
// index.php - Main Game Page
include('includes/header.php');  // Include the Navigation Toolbar

// Get the current page content dynamically based on the URL
$page = isset($_GET['page']) ? $_GET['page'] : 'empire'; 

// Include page content based on the selected section
switch ($page) {
    case 'empire':
        include('pages/empire.php');
        break;
    case 'fleet':
        include('pages/fleet.php');
        break;
    case 'marketplace':
        include('pages/marketplace.php');
        break;
    case 'research':
        include('pages/research.php');
        break;
    case 'notifications':
        include('pages/notifications.php');
        break;
    case 'messages':
        include('pages/messages.php');
        break;
    default:
        include('pages/empire.php');
        break;
}

include('includes/footer.php');  // Include footer content
?>
?>
