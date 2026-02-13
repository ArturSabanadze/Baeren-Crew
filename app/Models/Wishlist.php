<?php 

namespace App\Models;
use App\Traits\DB_Connection;
use PDO;

class Wishlist {
    use DB_Connection;

    public function getWishlistItems(int $wishlist_id, int $user_id): array
    {

        $db = $this->connectDB();

        $stmt = $db->prepare("SELECT wi.*, p.title, p.price, p.image_url, c.currency
                                FROM wishlist_items wi 
                                JOIN products p ON wi.product_id = p.id 
                                JOIN carts c ON c.user_id = ?
                                WHERE wi.wishlist_id = ?");
        $stmt->execute([$user_id, $wishlist_id]);
        $wishlistItems =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $wishlistItems;
    }

    public function addToWishlist(int $wishlist_id, int $product_id) : bool
    {
        $db = $this->connectDB();

        // Check if the product is already in the wishlist
        $stmt = $db->prepare("SELECT wi.product_id 
                                FROM wishlist_items wi 
                                JOIN wishlists w ON wi.wishlist_id = ? 
                                WHERE wi.product_id = ?");
        $stmt->execute([$wishlist_id, $product_id]);
        if ($stmt->fetch()) {
            $this->removeFromWishlist($wishlist_id, $product_id);
            return true; // Product already in wishlist
        }

        // Add to wishlist
        $stmt = $db->prepare("INSERT INTO wishlist_items 
                                (wishlist_id, product_id, quantity)
                                VALUES (?, ?, 1)");
        return $stmt->execute([$wishlist_id, $product_id]);
    }

    public function removeFromWishlist(int $wishlist_id, int $product_id) : bool
    {
        $db = $this->connectDB();

        $stmt = $db->prepare("DELETE FROM wishlist_items WHERE wishlist_id = ? AND product_id = ?");
        return $stmt->execute([$wishlist_id, $product_id]);
    }

    public function getProductsIDfromWishlist(int $wishlist_id) : array
    {
        $db = $this->connectDB();

        $stmt = $db->prepare("SELECT wi.product_id 
                                FROM wishlist_items wi  
                                WHERE wi.wishlist_id = ?");
        $stmt->execute([$wishlist_id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);  
    }
}
