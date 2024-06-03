<?php

require_once(__DIR__ . '/../controllers/AuthController.php');
require_once(__DIR__ . '/../controllers/DashboardController.php');
require_once(__DIR__ . '/../controllers/ChatController.php');

use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\ChatController;

// Instantiate controllers

$authController = new AuthController();
$dashboardController = new DashboardController();
$chatController = new ChatController();

// Router

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

switch ( $uri ) {
    case '':
    case '/':
        $authController->showLogin();
        break;
    case '/register':
        $authController->showRegister();
        break;
    case '/dashboard':
        $dashboardController->showDashboard();
        break;
    case '/rooms':
        $chatController->showRooms();
        break;
    case '/room/anime':
        if ( $method === 'POST' ) {
            $chatController->sendMessage();
        } else {
            $chatController->showRoom('anime');
        }
        break;
    case '/room/game':
        if ( $method === 'POST' ) {
            $chatController->sendMessage();
        } else {
            $chatController->showRoom('game');
        }
        break;
    case '/room/others':
        if ( $method === 'POST' ) {
            $chatController->sendMessage();
        } else {
            $chatController->showRoom('others');
        }
        break;
    default:
        http_response_code(404);
        echo "<h1>Page not found</h1>";
}