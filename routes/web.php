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

    default:
        (new PageController())->home();
}
