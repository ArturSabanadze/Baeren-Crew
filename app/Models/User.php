<?php

namespace App\Models;
use App\Traits\DB_Connection;
use Exception;
use PDO;

class User
{      
    use DB_Connection;
    //user table fields
        private ?int $id = 0;
        private string $username = "";
        private string $email = "";
        private string $status = "";
        private string $name = "";
        private string $surname = "";
        private string $birthdate = "";
        private string $gender = "";
        private string $phone = "";
        private string $biography = "";
        private string $profile_img_url = "";
        private string $address_type = "";
        private string $country = "";
        private string $city = "";
        private string $zip_code = "";
        private string $street = "";
        private string $street_number = "";
        private ?int $cart_id = null;
        private ?int $wishlist_id = null;
        private ?string $created_at = null;


    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function getID() : int
    {
        return $this->id;
    }

    public function setID(int $id) : void
    {
        $this->id = $id;
    }

    public function userExists(string $username, string $email) : bool
    {
        $db = $this->connectDB();
        $stmt = $db->prepare("SELECT id FROM users WHERE username = :u OR email = :e LIMIT 1");
        $stmt->execute([':u' => $username, ':e' => $email]);
        return (bool) $stmt->fetch();
    }
    
    public function createUser(array $userData) :bool
    {
        //check if user already exists
            if ($this->userExists($userData['username'], $userData['email'])) {
                throw new Exception('Username or email already exists');
                exit;
            }
        // Basic incoming data validation
            if (!$userData['username'] || !$userData['email'] || !$userData['password']) {
                throw new Exception('Username, email and password are required');
                exit;
            }
        // prepare statement
            $db = $this->connectDB();
            $insert = $db->prepare("
                INSERT INTO users (username, email, password_hash, status)
                VALUES (:username, :email, :password_hash, :status);
            ");
            $createProfile = $db->prepare("
                INSERT INTO user_profiles (user_id)
                VALUES (:user_id); 
            ");
            $createAddress = $db->prepare("
                INSERT INTO user_addresses (user_id)
                VALUES (:user_id);
            ");
            $createCart = $db->prepare("
                INSERT INTO carts (user_id)
                VALUES (:user_id);
            ");
            $createWishlist = $db->prepare("
                INSERT INTO wishlists (user_id)
                VALUES (:user_id);
            ");

            // execute statement with hashed password and return boolean result 
            $result = $insert->execute([
                ':username' => $userData['username'],
                ':email' => $userData['email'],
                ':password_hash' => password_hash($userData['password'], PASSWORD_BCRYPT),
                ':status' => 'active'
            ]);

            if ($result) {
                $userId = $db->lastInsertId();
                $createProfile->execute([':user_id' => $userId]);
                $createAddress->execute([':user_id' => $userId]);
                $createCart->execute([':user_id' => $userId]);
                $createWishlist->execute([':user_id' => $userId]);
            }

            return $result;
            
    }

    public function findByUsername($username): bool
    {
            $db = $this->connectDB();
            $stmt = $db->prepare("SELECT id FROM users WHERE username = :u LIMIT 1");
            $stmt->execute([':u' => $username]);
            return (bool) $stmt->fetch();
    }

    public function findByEmail($email): bool
    {
            $db = $this->connectDB();
            $stmt = $db->prepare("SELECT id FROM users WHERE email = :e LIMIT 1");
            $stmt->execute([':e' => $email]);
            return (bool) $stmt->fetch();
    }

    public function updateCredentials(int $user_id, array $data): bool
    {
        if (!$data) return false;

        $db = $this->connectDB();

        $fields = [];
        $params = [':id' => $user_id];

        if (!empty($data['username']) && $data['username'] !== $_SESSION['username'] && $data ['username'] !== '') 
        {
            $fields[] = 'username = :username';
            $params[':username'] = $data['username'];
        }
        if (!empty($data['email']) && $data['email'] !== $_SESSION['email'] && $data ['email'] !== '') 
        {
            $fields[] = 'email = :email';
            $params[':email'] = $data['email'];
        }
        if (!empty($data['password']) && $data['password'] !== '' ) 
        {
            $fields[] = 'password_hash = :password_hash';
            $params[':password_hash'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }

        if (!$fields) return false; // nothing to update

        $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);

        return true;
    }

    public function updateProfile(int $user_id, array $data): bool
    {
        if (!$data) return false;

        $db = $this->connectDB();

        $fields = [];
        $params = [':user_id' => $user_id];

        // Only include fields that are present and not empty
        $columns = ['name', 'surname', 'birthdate', 'gender', 'phone', 'biography', 'profile_img_url'];
        foreach ($columns as $col) {
            if (isset($data[$col]) && $data[$col] !== '') {
                $fields[] = "$col = :$col";
                $params[":$col"] = $data[$col];
            }
        }
        if (!$fields) return false; // nothing to update

        $sql = "UPDATE user_profiles SET " . implode(', ', $fields) . " WHERE user_id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);

        return true;
    }

    public function updateAddress(int $user_id, array $data): bool
    {
        if (!$data) return false;

        $db = $this->connectDB();

        $fields = [];
        $params = [':user_id' => $user_id];

        // Only include fields that are present and not empty
        $columns = ['address_type', 'country', 'city', 'zip_code', 'street', 'street_number'];
        foreach ($columns as $col) {
            if (isset($data[$col]) && $data[$col] !== '') {
                $fields[] = "$col = :$col";
                $params[":$col"] = $data[$col];
            }
        }
        if (!$fields) return false; // nothing to update

        $sql = "UPDATE user_addresses SET " . implode(', ', $fields) . " WHERE user_id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);

        return true;
    }

    public function authenticate(string $username, string $password): User
    {
        
       
        $db = $this->connectDB();
        $stmt = $db->prepare("SELECT u.id AS user_main_id, u.username, u.password_hash, u.email, u.status, u.created_at, up.*, ua.*, c.id AS cart_id, wl.id AS wishlist_id
                              FROM users u
                              LEFT JOIN user_profiles up ON u.id = up.user_id
                              LEFT JOIN user_addresses ua ON u.id = ua.user_id
                              LEFT JOIN carts c ON c.user_id = u.id
                              LEFT JOIN wishlists wl ON wl.user_id = u.id
                              WHERE u.username = :u OR u.email = :u
                              LIMIT 1

                            ");

        $stmt->execute([':u' => trim($username)]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            throw new \Exception('Invalid credentials');
        }   

        $this->id = $user['user_main_id'];
        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->status = $user['status'];
        $this->name = $user['name'] ?? '';
        $this->surname = $user['surname'] ?? '';
        $this->birthdate = $user['birthdate'] ?? '';
        $this->gender = $user['gender'] ?? '';
        $this->phone = $user['phone'] ?? '';
        $this->biography = $user['biography'] ?? '';
        $this->profile_img_url = $user['profile_img_url'] ?? '';
        $this->created_at = $user['created_at'] ?? '';
        $this->address_type = $user['address_type'] ?? '';
        $this->country = $user['country'] ?? '';
        $this->city = $user['city'] ?? '';
        $this->zip_code = $user['zip_code'] ?? '';
        $this->street = $user['street'] ?? '';
        $this->street_number = $user['street_number'] ?? '';
        $this->cart_id = $user['cart_id'] ?? '';
        $this->wishlist_id = $user['wishlist_id'] ?? '';

        return $this;
    }

    public function getUserCredentials(int $id) : array
    {
        $db = $this->connectDB();
        $stmt = $db->prepare("SELECT id, username, email, status FROM users WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'status' => $this->status
        ];
    }

    public function hydrateLoggedUser($user_id): void
    {
        $db = $this->connectDB();
        $stmt = $db->prepare("SELECT u.id AS user_main_id, u.username, u.email, u.status, u.created_at, up.*, ua.*, c.id AS cart_id, wl.id AS wishlist_id
                              FROM users u
                              LEFT JOIN user_profiles up ON u.id = up.user_id
                              LEFT JOIN user_addresses ua ON u.id = ua.user_id
                              LEFT JOIN carts c ON c.user_id = u.id
                              LEFT JOIN wishlists wl ON wl.user_id = u.id
                              WHERE u.id = :id
                              LIMIT 1

                            ");

        $stmt->execute([':id' => $user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            throw new \Exception('User not found');
        }   

        $this->id = $user['user_main_id'];
        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->status = $user['status'];
        $this->name = $user['name'] ?? '';
        $this->surname = $user['surname'] ?? '';
        $this->birthdate = $user['birthdate'] ?? '';
        $this->gender = $user['gender'] ?? '';
        $this->phone = $user['phone'] ?? '';
        $this->biography = $user['biography'] ?? '';
        $this->profile_img_url = $user['profile_img_url'] ?? '';
        $this->created_at = $user['created_at'] ?? '';
        $this->address_type = $user['address_type'] ?? '';
        $this->country = $user['country'] ?? '';
        $this->city = $user['city'] ?? '';
        $this->zip_code = $user['zip_code'] ?? '';
        $this->street = $user['street'] ?? '';
        $this->street_number = $user['street_number'] ?? '';
        $this->cart_id = $user['cart_id'] ?? '';
        $this->wishlist_id = $user['wishlist_id'] ?? '';
        
    }

}
?>