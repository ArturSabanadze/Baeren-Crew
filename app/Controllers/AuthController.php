<?php

namespace App\Controllers;

use App\Helpers\View;

class AuthController {

    public function login()
    {
        APIController::redirectLoggedInUser();
        $action = APIController::checkPostAction();

        if ($action) {
            $success = ApiController::excecuteAction($action, $_POST);

            // AJAX request → return JSON only
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                echo json_encode(['success' => $success]);
                return;
                }
        }

        View::render('login', [
            'title' => 'Login',
            'description' => 'Welcome to our webshop! Login to access your account and explore our wide range of products...',
            'styles' => ['global', 'main', 'navbar', 'footer', 'quick_links_bar', 'pageContent', 'login'],
            'scripts' => ['authenticate'],
        ]);
    }

    public function register()
    {
        $action = APIController::checkPostAction();
        if ($action === 'register_new_user') {
            $success = ApiController::createNewUser();
            echo json_encode(['success' => $success]);
            return;
        }
         ApiController::redirectLoggedInUser();
         View::render('register', [
            'title' => 'Register',
            'description' => 'Create a new account to start shopping with us!',
            'styles' => ['global', 'main', 'navbar', 'footer', 'quick_links_bar', 'pageContent', 'login', 'register'],
            'scripts' => ['registration']
        ]);
    }

    public function logout(): void 
    {
        session_unset();
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }
}
