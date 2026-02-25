<?php

use App\Controllers\PageController;

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        (new PageController())->home();
        break;

    case 'agb':
        (new PageController())->agb();
        break;

    case 'dsgvo':
        (new PageController())->dsgvo();
        break;
    case 'impressum':
        (new PageController())->impressum();
        break;
    case 'jobs':
        (new PageController())->jobs();
        break;

    default:
        (new PageController())->home();
}
