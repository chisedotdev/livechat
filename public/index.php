<?php

session_start();

require_once(__DIR__ . '/../app/helpers/helper.php');
require_once(__DIR__ . '/../server/bootstrap.php');
require_once(__DIR__ . '/../app/controllers/UserController.php');
require_once(__DIR__ . '/../app/controllers/DashboardController.php');
require_once(__DIR__ . '/../app/controllers/ChatController.php');

use Controllers\UserController;
use Controllers\DashboardController;
use Controllers\ChatController;

// Instantiate controllers

$userController = new UserController();
$dashboardController = new DashboardController();
$chatController = new ChatController();

// Router

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];


// check for /room/:value path using regex
if ( preg_match('/^\/room\/.+/', $uri) ) {
    if ( is_auth() === false ) {
        redirect('/', true);
    }
    $rooms = ['anime', 'games', 'others'];
    $arr = explode('/', $uri);
    $room = $arr[count($arr) - 1];

    if ( !in_array($room, $rooms) ) {
        http_response_code(404);
        echo "<h1>Page not found</h1>";
        exit();
    }

    if ( $method === 'POST' ) {
        if ( is_empty($_POST) ) {
            redirect("/room/$room", true);
        }
        // sanitize inputs
        $sanitized = sanitize($_POST);

        $chatController->saveMessage($sanitized);

        // do nothing after saving the message to the database ???
    } else {
        $msgs = $chatController->getAllMessages($room);
        $chatController->showRoom($room, $msgs);
    }
} else {
    switch ( $uri ) {
        case '':
        case '/':
            if ( is_auth() === false ) {
                if ( $method === 'POST' ) {
                    if ( is_empty($_POST) ) {
                        redirect('/', true);
                    } else {
                        // sanitize inputs
                        $sanitized = sanitize($_POST);
        
                        $res = $userController->login($sanitized['_email'], $sanitized['_password']);
        
                        if ( $res['status'] === true ) {
                            $_SESSION['_loggedIn'] = true;
                            $_SESSION['_username'] = $res['username'];
                            redirect('/dashboard', true);
                        }
                        $userController->showLogin($res);
                        exit();
                    }
                } else {
                    $userController->showLogin();
                    exit();
                }
            }
            redirect('/dashboard', true);
            break;
        case '/register':
            if ( is_auth() === false ) {
                if ( $method === 'POST' ) {
                    // check if inputs are empty
                    if ( is_empty($_POST) ) {
                        redirect('/register', true);
                    } else {    
                        // sanitize inputs
                        $sanitized = sanitize($_POST);
        
                        $res = $userController->register($sanitized['_email'], $sanitized['_username'], $sanitized['_password']);
        
                        if ( $res['status'] === false ) {
                            $userController->showRegister($res);
                            exit();
                        } else {
                            $userController->showRegister($res);
                            redirect('/');
                        }
                    }
                } else {
                    $userController->showRegister();
                    exit();
                }
            }
            redirect('/dashboard', true);
            break;
        case '/logout':
            if ( is_auth() === false || $method !== 'POST' ) {
                redirect('/', true);
            }
            $userController->logout();
            redirect('/', true);
            break;
        case '/dashboard':
            if ( is_auth() === false ) {
                redirect('/', true);
            }
            $dashboardController->showDashboard();
            break;
        case '/rooms':
            if ( is_auth() === false ) {
                redirect('/', true);
            }
            $chatController->showRooms();
            break;
        default:
            http_response_code(404);
            echo "<h1>Page not found</h1>";
    }
}
