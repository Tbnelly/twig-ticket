<?php
require_once __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        echo $twig->render('landing.twig', ['current_page' => 'home']);
        break;

    case '/auth/login':
        echo $twig->render('login.twig', ['current_page' => 'login']);
        break;

    case '/auth/signup':
        echo $twig->render('signup.twig', ['current_page' => 'signup']);
        break;

    case '/dashboard':
        echo $twig->render('dashboard.twig');
        break;

    case '/tickets':
        echo $twig->render('tickets.twig');
        break;


    default:
        http_response_code(404);
        echo $twig->render('404.twig', ['current_page' => '404']);
        break;
}

