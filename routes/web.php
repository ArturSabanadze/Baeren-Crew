<?php

use App\Controllers\PageController;
use App\Controllers\AuthController;

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'login':
        (new AuthController())->login();
        break;

    case 'register':
        (new AuthController())->register();
        break;

    case 'logout':
        (new AuthController())->logout();
        break;

    case 'cart':
        (new PageController())->cart();
        break;
    
    case 'my-account':
        (new PageController())->account();
        break;

    case 'single-product':
        (new PageController())->singleProduct();
        break;

    default:
        (new PageController())->home();
}
