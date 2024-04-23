<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database file
require_once 'src/includes/db.php';

// Include the controller classes
require_once 'src/controllers/AuthController.php';
require_once 'src/controllers/HomeController.php';

$db = new Database();
$pdo = $db->getConnection();


// Check the requested URI and route accordingly
if ($_SERVER['REQUEST_URI'] == '/register') {
    // Instantiate AuthController with PDO object

    $controller = new AuthController($pdo);
    $controller->register();
} elseif ($_SERVER['REQUEST_URI'] == '/login') {
    // Instantiate AuthController with PDO object
    $controller = new AuthController($pdo);
    $controller->login();
} elseif ($_SERVER['REQUEST_URI'] == '/') {
    // Instantiate HomeController with PDO object
    $controller = new HomeController($pdo);
    $controller->index();
} elseif ($_SERVER['REQUEST_URI'] == '/dashboard') {
    $controller = new HomeController($pdo);
    $controller->dashboard();
} else {
    header("HTTP/1.0 404 Not Found");
    echo 'Page not found!';
}
?>
