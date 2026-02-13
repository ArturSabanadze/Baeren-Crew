<?php
namespace App\Models;
use App\Traits\DB_Connection;
use PDO;

class Cart
{
    use DB_Connection;

    private $id = null;
    private $user_id;
    private $currency;
    private $created_at;
    private $updated_at;

    public function create(int $user_id): void
    {
        $pdo = $this->connectDB();    
        $stmt = $pdo->prepare("INSERT INTO carts (user_id, currency) VALUES (?, ?)");
        $stmt->execute([$user_id, 'USD']);
        $this->id = $pdo->lastInsertId();
    }

    public function read(int $cart_id): array
    {
        $pdo = $this->connectDB();
        $stmt = $pdo->prepare("SELECT * FROM carts WHERE id = ?");
        $stmt->execute([$cart_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update(): void
    {
        $pdo = $this->connectDB(); 
        $stmt = $pdo->prepare("UPDATE carts SET currency = ?, updated_at = ? WHERE id = ?");
        $stmt->execute([$this->currency, date('Y-m-d H:i:s'), $this->id]);
    }

    //Dont use it for uniq_db carts table as it have FK to users table
    public function delete(): void
    {
        $pdo = $this->connectDB();
        $stmt = $pdo->prepare("DELETE FROM carts WHERE id = ?");
        $stmt->execute([$this->id]);
    }

    public function getAllCartItems(int $cart_id): array
    {
        $pdo = $this->connectDB();
        $stmt = $pdo->prepare(
            "SELECT ci.*, p.title, p.description, p.image_url, p.price
             FROM cart_items ci
             JOIN products p ON ci.product_id = p.id
             WHERE ci.cart_id = ?"
        );
        $stmt->execute([$cart_id]);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ['items' => $items]; 
    }

    public function addToCart(int $cart_id, int $product_id, int $quantity = 1 ): bool 
    {
        $pdo = $this->connectDB();
    
        // Fetch product price
        $stmt = $pdo->prepare(
            "SELECT price FROM products WHERE id = ? LIMIT 1"
        );
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$product) {
            return false; // product does not exist
        }
    
        // Insert or update cart item
        $stmt = $pdo->prepare(
            "INSERT INTO cart_items 
                (cart_id, product_id, unit_price, quantity, applied_discount)
             VALUES (?, ?, ?, ?, 0)
             ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)"
        );
    
        return $stmt->execute([
            $cart_id,
            $product_id,
            $product['price'],
            $quantity
        ]);
    }

    public function removeFromCart(int $cart_id, int $product_id, int $quantity = 1): bool
    {
        $pdo = $this->connectDB();

        // 1. Get current quantity
        $stmt = $pdo->prepare(
            "SELECT quantity FROM cart_items WHERE cart_id = ? AND product_id = ?"
        );
        $stmt->execute([$cart_id, $product_id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$item) {
            return false; // item not in cart
        }
        else {
            // Remove item completely
            $stmt = $pdo->prepare(
                "DELETE FROM cart_items WHERE cart_id = ? AND product_id = ?"
            );
            return $stmt->execute([$cart_id, $product_id]);
        }

        
    }

    public function reduceItemQty(int $cart_id, int $product_id, int $quantity = 1): bool
    {
        $pdo = $this->connectDB();

        // 1. Get current quantity
        $stmt = $pdo->prepare(
            "SELECT quantity FROM cart_items WHERE cart_id = ? AND product_id = ?"
        ); 
        $stmt->execute([$cart_id, $product_id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$item) {
            return false;
        }

        if ($item['quantity'] > $quantity) {
            $stmt = $pdo->prepare(
                "UPDATE cart_items
                 SET quantity = quantity - ?
                 WHERE cart_id = ? AND product_id = ?"
            );
            return $stmt->execute([$quantity, $cart_id, $product_id]);
        } else {
            // Remove item completely
            $stmt = $pdo->prepare(
                "DELETE FROM cart_items WHERE cart_id = ? AND product_id = ?"
            );
            return $stmt->execute([$cart_id, $product_id]);
        }
    }

    public function countItems(int $cart_id): int
    {
        $pdo = $this->connectDB();
        $stmt = $pdo->prepare("SELECT SUM(quantity) as total_items FROM cart_items WHERE cart_id = ?");
        $stmt->execute([$cart_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($result['total_items'] ?? 0);
    }

}