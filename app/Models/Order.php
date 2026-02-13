<?php
namespace App\Models;
use App\Traits\DB_Connection;
use PDO;

class Order
{
    use DB_Connection;

    private $id = null;
    private $user_id;
    private $status;
    private $total_amount;
    private $currency;
    private $billing_address_id;
    private $shipping_address_id;
    private $bl_address_snapshot;
    private $sh_address_snapshot;
    private $created_at;

    public function create(int $user_id, $data): void
    {
        $pdo = $this->connectDB();    
        $stmt = $pdo->prepare("INSERT INTO orders 
        (user_id, status, total_amount, currency, billing_address_id, shipping_address_id, bl_address_snapshot, sh_address_snapshot) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([
            $user_id,
            $data['status'],
            $data['total_amount'],
            $data['currency'],
            $data['billing_address_id'],
            $data['shipping_address_id'],
            json_encode($data['billing_address']),
            json_encode($data['shipping_address'])
        ]);

        // Add order items
        $order_id = $pdo->lastInsertId();
        $itemStmt = $pdo->prepare("INSERT INTO order_items 
                        (order_id, product_id, quantity, unit_price, status, applied_discount) 
                        VALUES (?, ?, ?, ?, ?, ?)
                        ");
        foreach ($data['items'] as $item) {
            $itemStmt->execute([
                $order_id,
                $item['product_id'],
                $item['quantity'],
                $item['unit_price'],
                $item['status'],
                $item['applied_discount'] ?? 0
            ]);
        }
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

    public function getAllOrders(int $userID): array
    {
        if (!$userID) return [];

        $db = $this->connectDB();
        $stmt = $db->prepare(
            "SELECT 
                o.id AS order_id,
                o.created_at,
                o.status,
                o.total_amount AS total_amount,
                o.currency,
                oi.quantity,
                p.id AS product_id,
                p.title,
                p.description,
                p.image_url,
                p.price
            FROM orders o
            JOIN order_items oi ON o.id = oi.order_id
            JOIN products p ON oi.product_id = p.id
            WHERE o.user_id = :user_id
            ORDER BY o.created_at DESC"
        );

        $stmt->bindValue(':user_id', $userID, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Group items by order
        $orders = [];
        foreach ($rows as $row) {
            $orderId = $row['order_id'];
            if (!isset($orders[$orderId])) {
                $orders[$orderId] = [
                    'id' => $orderId,
                    'created_at' => $row['created_at'],
                    'status' => $row['status'],
                    'total_amount' => $row['total_amount'],
                    'currency' => $row['currency'],
                    'items' => []
                ];
            }

            $orders[$orderId]['items'][] = [
                'product_id' => $row['product_id'],
                'title' => $row['title'],
                'description' => $row['description'],
                'image_url' => $row['image_url'],
                'price' => $row['price'],
                'quantity' => $row['quantity']
            ];
        }

        return array_values($orders);
    }

    public function getTop10OrderItems(): array
    {
        $db = $this->connectDB();
        $query = "SELECT oi.product_id, o.id, SUM(oi.quantity) AS total_quantity
                  FROM order_items oi
                  JOIN orders o ON oi.order_id = o.id
                  WHERE o.status = 'completed'
                  GROUP BY oi.product_id
                  ORDER BY total_quantity DESC
                  LIMIT 10";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}