<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserAddress;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;

class APIController
{

    //Helpers functions for API calls, e.g. checking for POST actions, user information, etc.
        public static function checkPostAction()
        {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $_POST['action'] ?? null;
        }
        return null;
        }

        public static function checkMultipleAction() : array
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $actions = [];
                foreach ($_POST as $key => $value) {
                    if (strpos($key, 'action_') === 0) {
                        $actions[] = str_replace('action_', '', $key);
                    }
                }
                return $actions;
            }
            return [];
        }
    //Conditional execution of API functions based on action parameter
        public static function excecuteAction($action, $data): bool | array | int
        {

            switch ($action) {
                case 'authenticate':
                    return self::login($data);
                case 'update_user_profile':
                    return self::updateUserProfile($data);
                case 'add_to_wishlist':
                    return self::addToWishlist($data['product_id']);
                case 'get_user_wishlist':
                    return self::getWishlistItems();
                case 'get_all_orders':
                    return self::getAllOrders();
                case 'count_cart_items':
                    return self::countCartItems($_SESSION['cart_id']);
                default:
                    return false;
            }
        }
    
    //Product APIs
        public static function getAllProductDetails(): array
        {
            $product = new Product([]);
            return $product->getAllProductDetails($_GET['pid'] ?? null);
        }

        public static function getAllProductsAttributes(): array
        {
            $product = new Product([]);
            return $product->getProductAttributes($_GET['pid'] ?? null);
        }
    //User APIs
        public static function checkForUserID(): bool
        {
        return isset($_SESSION['user_id']);
        }

        public static function hydrateSessionUserData(): void
        {
            $user = new User();
            $user->hydrateLoggedUser($_SESSION['user_id']);
            if (isset($_SESSION['user_id'])) {
                $_SESSION['username']    = $user->username;
                $_SESSION['email']       = $user->email;
                $_SESSION['name']        = $user->name;
                $_SESSION['surname']    = $user->surname;
                $_SESSION['phone']      = $user->phone;
                $_SESSION['birthdate']  = $user->birthdate;
                $_SESSION['gender']     = $user->gender;
                $_SESSION['biography'] = $user->biography;
                $_SESSION['profile_img_url'] = $user->profile_img_url;
                $_SESSION['country']    = $user->country;
                $_SESSION['city']       = $user->city;
                $_SESSION['street']     = $user->street;
                $_SESSION['street_number'] = $user->street_number;
                $_SESSION['zip_code'] = $user->zip_code;
                $_SESSION['cart_id']     = $user->cart_id;
                $_SESSION['wishlist_id'] = $user->wishlist_id;
            }
        }            
            
        public static function requireLogin(): void
        {
        if (!self::checkForUserID()) {
            header('Location: index.php?page=login');
            exit; 
        }
        }

        public static function redirectLoggedInUser(): void
        {
            if (self::checkForUserID()) {
                header('Location: index.php?page=home');
                exit; 
            }
        }

        public static function countCartItems(): int
        {
            $cart = new Cart();
            return $cart->countItems($_SESSION['cart_id']);
        }

        public static function getCartItems(): array
        {
            $cart = new Cart();
            return $cart->getAllCartItems($_SESSION['cart_id']);
        }

        public static function addToCart(int $productId, int $quantity = 1): bool
        {
            $cart = new Cart();
            return $cart->addToCart($_SESSION['cart_id'], $productId, $quantity);
        }

        public static function removeFromCart(int $productId, int $quantity = 1): bool
        {
            $cart = new Cart();
            return $cart->removeFromCart($_SESSION['cart_id'], $productId, $quantity);
        }

        public static function reduceItemQty(int $productId, int $quantity = 1): bool
        {
            $cart = new Cart();
            return $cart->reduceItemQty($_SESSION['cart_id'], $productId, $quantity);
        }

        public static function addToWishlist(int $productId): bool
        {
            if (!self::checkForUserID()) {
                header('Location: index.php?page=login');
                exit; 
            }
            $wishlist = new Wishlist();
            return $wishlist->addToWishlist($_SESSION['wishlist_id'], $productId);
        
        }

        public static function getWishlistItems(): array
        {
            if (!self::checkForUserID()) {
                header('Location: index.php?page=login');
                exit; 
            }
            if (empty($_SESSION['wishlist_id']) || empty($_SESSION['user_id'])) {
            error_log('Wishlist session missing');
            return ['error' => 'No SESSION data'];
            }

            $wishlist = new Wishlist();
            $wishlistItems = $wishlist->getWishlistItems($_SESSION['wishlist_id'], $_SESSION['user_id']);
            return $wishlistItems;
        }

        public static function getAllOrders(): array
        {
            $order = new Order([]);
            return $order->getAllOrders($_SESSION['user_id']);
        }

        public static function getProductsIDfromWishlist(): array
        {
            if (!self::checkForUserID()) {
                header('Location: index.php?page=login');
                exit; 
            }
            if (empty($_SESSION['wishlist_id'])) {
            error_log('Wishlist session missing');
            return ['error' => 'No SESSION data'];
            }

            $wishlist = new Wishlist();
            $productIDs = $wishlist->getProductsIDfromWishlist($_SESSION['wishlist_id']);
            return $productIDs;
        }

        //API functions to execute based on POST actions, e.g. registrate, authenticate, update user profile, etc.
            public static function login($_formData): bool
            {
            $user = new User();
            $userInstance = $user->authenticate($_formData['username'], $_formData['password']);

            if ($userInstance) {
            $_SESSION['user_id']     = $userInstance->id;
            $_SESSION['username']    = $userInstance->username;
            $_SESSION['email']       = $userInstance->email;
            $_SESSION['name']        = $userInstance->name;
            $_SESSION['surname']    = $userInstance->surname;
            $_SESSION['phone']      = $userInstance->phone;
            $_SESSION['birthdate']  = $userInstance->birthdate;
            $_SESSION['gender']     = $userInstance->gender;
            $_SESSION['biography'] = $userInstance->biography;
            $_SESSION['profile_img_url'] = $userInstance->profile_img_url;
            $_SESSION['country']    = $userInstance->country;
            $_SESSION['city']       = $userInstance->city;
            $_SESSION['street']     = $userInstance->street;
            $_SESSION['street_number'] = $userInstance->street_number;
            $_SESSION['zip_code'] = $userInstance->zip_code;
            $_SESSION['cart_id']     = $userInstance->cart_id;
            $_SESSION['wishlist_id'] = $userInstance->wishlist_id;

            return true;
            }
            return false;
            }

            public static function createNewUser(): bool
            {
                $user = new User();
                $userInstance = $user->createUser($_POST);
                return $userInstance ? true : false;
            }

            public static function updateUserProfile(): bool
            {
            if (!self::checkForUserID()) {
                throw new \Exception('User not logged in');
                return false;
            }

            $user = new User();
            $profile = new UserProfile();
            $address = new UserAddress();

            try{
                $user->updateCredentials($_SESSION['user_id'], $_POST);
                $profile->updateProfile($_SESSION['user_id'], $_POST);
                $address->updateAddress($_SESSION['user_id'], $_POST);
                self::hydrateSessionUserData();


            }
            catch (\Exception $e){
                throw new \Exception('Failed to update user profile: ' . $e->getMessage());
                return false;
            }

            return true;
            }
    

    //Cart APIs
        // e.g. addToCart, removeFromCart, getCartItems, etc.

}
