<?php
namespace App\Controllers;

use App\Helpers\View;
use App\Models\Product;

class PageController
{
    public function home()
    {
        $scriptsForLoggedInUsers = ['cart_handler', 'wishlist_handler'];
         if (isset($_SESSION['user_id'])) {
            $scripts = array_merge(['Big_carousel', 'product_carousel', 'product_card_nav'], $scriptsForLoggedInUsers);
         } else {
            $scripts = ['Big_carousel', 'product_carousel', 'product_card_nav'];
         }
        $action = APIController::checkPostAction();
        if (isset($_SESSION['user_id']) && $action === 'count_cart_items') {
            $cartItemsCount = APIController::countCartItems();
            $_SESSION['cart_items_count'] = $cartItemsCount;
            echo json_encode(
                $cartItemsCount
            );
            exit;
        }
        if (isset($_SESSION['user_id']) && $action === 'add_to_cart') {
            $productId = (int)($_POST['product_id'] ?? 0);
            $success = APIController::addToCart($productId);
            echo json_encode([
                'success' => $success,
                'message' => $success ? 'Added to cart' : 'Failed to add'
            ]);
            exit;
        }
        if (isset($_SESSION['user_id']) && $action === 'add_to_wishlist') {
            $productId = (int)($_POST['product_id'] ?? 0);
            $success = APIController::addToWishlist($productId);
            echo json_encode([
                'success' => $success,
                'message' => $success ? 'Added to wishlist' : 'Failed to add'
            ]);
            exit;
        }
        if (isset($_SESSION['user_id']) && $action === 'get_wishlist_product_ids') {
            $wishlistItems = APIController::getWishlistItems();
            $productIDs = array_map(fn($item) => $item['product_id'], $wishlistItems);
            echo json_encode(['success' => true,
            'product_ids' => $productIDs]);
            exit;
        }

        $products = (new Product([]))->getAllProducts();
        View::render('home', [
            'title' => 'Home',
            'meta_description' => ['Umzüge leicht gemacht '],
            'description' => 'Unsere Firma bietet professionelle Umzugsdienstleistungen, die Ihren Umzug stressfrei und effizient gestalten. Mit unserem erfahrenen Team und maßgeschneiderten Lösungen kümmern wir uns um alle Aspekte Ihres Umzugs, von der Planung bis zur Durchführung. Vertrauen Sie auf unsere Expertise, um Ihren Umzug reibungslos zu gestalten.',
            'styles' => ['global', 'main', 'navbar', 'footer', 'center', 'header'],
            'scripts' => $scripts,
            'username' => $_SESSION['username'] ?? null,
            'cart_id' => $_SESSION['cart_id'] ?? null,
            'allProducts' => $products
        ]);
    }

    public function cart()
    {
        $action = APIController::checkPostAction();
        if (isset($_SESSION['user_id']) && $action === 'count_cart_items') {
            $cartItemsCount = APIController::countCartItems();
            $_SESSION['cart_items_count'] = $cartItemsCount;
            echo json_encode(
                $cartItemsCount
            );
            exit;
        }
        if (isset($_SESSION['user_id']) && $action === 'get_cart_items') {
            $cartItems = APIController::getCartItems();
            echo json_encode(
                $cartItems
            );
            exit;
        }
        if (isset($_SESSION['user_id']) && $action === 'add_to_cart') {
            $productId = (int)($_POST['product_id'] ?? 0);
            $success = APIController::addToCart($productId);
            echo json_encode([
                'success' => $success,
                'message' => $success ? 'Added to cart' : 'Failed to add'
            ]);
            exit;
        }
        if (isset($_SESSION['user_id']) && $action === 'reduce_item_qty') {
            $productId = (int)($_POST['product_id'] ?? 0);
            $success = APIController::reduceItemQty($productId);
            echo json_encode([
                    'success' => $success,
                    'message' => $success ? 'Removed from cart' : 'Failed to remove'
            ]);
            exit;
        }
        if (isset($_SESSION['user_id']) && $action === 'remove_from_cart') {
            $productId = (int)($_POST['product_id'] ?? 0);
            $success = APIController::removeFromCart($productId);
            echo json_encode([
                    'success' => $success,
                    'message' => $success ? 'Removed from cart' : 'Failed to remove'
            ]);
            exit;
        }
        View::render('cart', [
            'title' => 'Cart',
            'description' => 'Welcome to our webshop! Explore our wide range of products...',
            'styles' => ['global', 'main', 'navbar', 'footer', 'quick_links_bar', 'pageContent', 'cart', 'product_card'],
            'scripts' => ['cart_handler'],
            'username' => $_SESSION['username'] ?? null,
            'cart_id' => $_SESSION['cart_id'] ?? null
        ]);
    }

    public function account()
    {
        
        APIController::requireLogin();
        $action = APIController::checkPostAction();
        if ($action ==='update_user_profile') {
            $success = APIController::updateUserProfile();
            echo json_encode(['success' => $success]);
            return;
        }

        if ($action === 'get_user_wishlist') {
            $wishlistItems = APIController::getWishlistItems();
            echo json_encode($wishlistItems);
            return;         
        }

        if ($action === 'get_all_orders') {
            $ordersItems = APIController::getAllOrders();
            echo json_encode($ordersItems);
            return;
        }

        if ($action === 'get_wishlist_product_ids') {
            $wishlistItems = APIController::getWishlistItems();
            $productIDs = array_map(fn($item) => $item['product_id'], $wishlistItems);
            echo json_encode(['success' => true,
            'product_ids' => $productIDs]);
            exit;
        }

        if ($action === 'add_to_wishlist') {
            $productId = (int)($_POST['product_id'] ?? 0);
            $success = APIController::addToWishlist($productId);
            echo json_encode([
                'success' => $success,
                'message' => $success ? 'Added to wishlist' : 'Failed to add'
            ]);
            exit;
        }

        View::render('profile', [
            'title' => 'My Account',
            'description' => 'Manage your account details, view your order history, and update your preferences.',
            'styles' => ['global', 'main', 'navbar', 'footer', 'quick_links_bar', 'pageContent', 'user_account', 'user_orders', 'user_wishlist', 'product_card'],
            'scripts' => ['wishlist_handler', 'orders_handler', 'persist_active_tab', 'account_handler']
        ]);
    }

    public function singleProduct()
    {
        $productDetails = APIController::getAllProductDetails();
        $attributes = APIController::getAllProductsAttributes();
        $currentTitle = $_SESSION['current_product'] ?? null;
        $action = APIController::checkPostAction();

        View::render('single-product', [
            'title' => $currentTitle ?? 'Product Details',
            'description' => 'Explore the features and details of our exclusive product.',
            'styles' => ['global', 'main', 'navbar', 'footer', 'quick_links_bar', 'pageContent', 'product_card', 'single_product'],
            'scripts' => ['wishlist_handler', 'orders_handler', 'persist_active_tab'],
            'productDetails' => $productDetails,
            'attributes' => $attributes
        ]);
    }
}
