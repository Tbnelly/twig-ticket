<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

$page = $_GET['page'] ?? 'landing';

// Frontend-only app, so no PHP session-based authentication
switch ($page) {
    case 'login':
        echo $twig->render('login.twig', [
            'current_page' => 'login',
            'hide_navbar' => false,
            'hide_footer' => false
        ]);
        break;

    case 'signup':
        echo $twig->render('signup.twig', [
            'current_page' => 'signup',
            'hide_navbar' => false,
            'hide_footer' => false
        ]);
        break;

    case 'dashboard':
        // No session check — handled by JS localStorage
        echo $twig->render('dashboard.twig', [
            'current_page' => 'dashboard',
            'hide_navbar' => true,
            'hide_footer' => true
        ]);
        break;

    case 'tickets':
        // No session check — handled by JS localStorage
        echo $twig->render('tickets.twig', [
            'current_page' => 'tickets',
            'hide_navbar' => true,
            'hide_footer' => true
        ]);
        break;

    default:
        echo $twig->render('landing.twig', [
            'current_page' => 'landing',
            'hide_navbar' => false,
            'hide_footer' => false
        ]);
}
