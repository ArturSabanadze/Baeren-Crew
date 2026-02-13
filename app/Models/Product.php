<?php
namespace App\Models;
use App\Traits\DB_Connection;
use PDO;

class Product
{
    use DB_Connection;

    //product table fields
        private ?int $id = null;
        private string $title;
        private string $description;
        private string $image_url;
        private float $price;
        private string $status;
        private array $tags;
        private string $start_selling_date;
        private string $created_at;
        private ?array $attributes = null;

    
    function __construct(array $product_data)
    {
        // General product fields
        $this->title = $product_data['title'] ?? "";
        $this->description = $product_data['description'] ?? "";
        $this->image_url = $product_data['image_url'] ?? "";
        $this->price = (float) ($product_data['price'] ?? 0.0);
        $this->status = $product_data['status'] ?? "inactive";
        $this->tags = $product_data['tags'] ?? [];
        $this->start_selling_date = $product_data['start_selling_date'] ?? "";
        $this->created_at = date('Y-m-d H:i:s');
        $this->attributes = $product_data['attributes'] ?? null;
    }

    // Generic getter and setter methods
    public function __get($key)
    {
        return $this->$key ?? null;
    }

    public function __set($key, $value): void
    {
        $this->$key = $value;
    }

    function getAllProducts(): array
    {
        $db = $this->connectDB();
        $query = "SELECT * FROM products ORDER BY created_at DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAllProductDetails($productId): array
    {
        $db = $this->connectDB();
        $stmt = $db->prepare ("SELECT p.*, pa.*, pc.*, pl.*, pr.*, a.name  FROM products p
                  LEFT JOIN product_attributes pa ON p.id = pa.product_id
                  LEFT JOIN product_categories pc ON p.id = pc.product_id
                  LEFT JOIN product_likes pl ON p.id = pl.product_id
                  LEFT JOIN product_ratings pr ON p.id = pr.product_id
                  LEFT JOIN attributes a ON pa.attribute_id = a.id
                  WHERE p.id = :id"
                  );
        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getProductAttributes($productId): array
    {
        $db = $this->connectDB();

        $stmt = $db->prepare("
            SELECT 
                CONCAT(
                    '{',
                    GROUP_CONCAT(
                        CONCAT(
                            '\"', t.name, '\": {',
                                '\"type\": \"', t.data_type, '\", ',
                                '\"values\": [', t.values_array, ']',
                            '}'
                        )
                        SEPARATOR ','
                    ),
                    '}'
                ) AS attributes
            FROM (
                SELECT 
                    pa.product_id,
                    a.name,
                    a.data_type,
                    GROUP_CONCAT(
                        DISTINCT CONCAT('\"', REPLACE(pa.value, '\"', '\\\\\"'), '\"')
                        SEPARATOR ','
                    ) AS values_array
                FROM product_attributes pa
                JOIN attributes a 
                    ON a.id = pa.attribute_id
                WHERE pa.product_id = :id
                GROUP BY pa.product_id, a.name, a.data_type
            ) t
        ");

        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result || !$result['attributes']) {
        return [];
        }

        return json_decode($result['attributes'], true);
    }

}