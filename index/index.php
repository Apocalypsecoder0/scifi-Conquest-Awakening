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
?>
