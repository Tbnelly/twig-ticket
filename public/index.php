<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

// Simple routing
$page = $_GET['page'] ?? 'landing';

switch ($page) {
    case 'login':
        echo $twig->render('login.twig');
        break;
    case 'signup':
        echo $twig->render('signup.twig');
        break;
    case 'dashboard':
        // Example of protecting route
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /?page=login');
            exit;
        }
        echo $twig->render('dashboard.twig');
        break;
    case 'tickets':
        echo $twig->render('tickets.twig');
        break;
    default:
        echo $twig->render('landing.twig');


}

