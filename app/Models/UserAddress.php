<?php

namespace App\Models;
use App\Traits\DB_Connection;
use PDO;
use PDOException;

class UserAddress
{
    use DB_Connection;

    public function saveAddress(int $user_id, array $addressData): void
    {
        $dbconn = new DB_Connection();
        $db = $dbconn->connectDB();
        $insert = $db->prepare("
            INSERT INTO user_addresses 
            (user_id, address_type, country, city,  zip_code, street, street_number)
            VALUES (:user_id, :address_type, :country, :city, :zip_code, :street, :street_number);
        ");
        $insert->execute([
            ':user_id' => $user_id,
            ':address_type' => $addressData['address_type'],
            ':country' => $addressData['country'],
            ':city' => $addressData['city'],
            ':zip_code' => $addressData['zip_code'],
            ':street' => $addressData['street'],
            ':street_number' => $addressData['street_number']
        ]);
    }

    public function updateAddress(int $user_id, array $data): void
    {
        if (!$data) {
            return; // nothing to update
        }

        
        $db = $this->connectDB();

        $fields = [];
        $params = [':id' => $user_id];

        // Only include fields that are present and not null
        if (isset($data['address_type']) && $data['address_type'] !== '') {
            $fields[] = 'address_type = :address_type';
            $params[':address_type'] = $data['address_type'];
        }
        if (isset($data['country']) && $data['country'] !== '') {
            $fields[] = 'country = :country';
            $params[':country'] = $data['country'];
        }
        if (isset($data['city']) && $data['city'] !== '') {
            $fields[] = 'city = :city';
            $params[':city'] = $data['city'];
        }
        if (isset($data['zip_code']) && $data['zip_code'] !== '') {
            $fields[] = 'zip_code = :zip_code';
            $params[':zip_code'] = $data['zip_code'];
        }
        if (isset($data['street']) && $data['street'] !== '') {
            $fields[] = 'street = :street';
            $params[':street'] = $data['street'];
        }
        if (isset($data['street_number']) && $data['street_number'] !== '') {
            $fields[] = 'street_number = :street_number';
            $params[':street_number'] = $data['street_number'];
        }

        // Nothing to update
        if (!$fields) {
            return;
        }

        $sql = 'UPDATE user_addresses SET ' . implode(', ', $fields) . ' WHERE user_id = :id';

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute($params);
        } catch (PDOException $e) {
            error_log('Update user address failed: ' . $e->getMessage());
            throw $e; // optionally rethrow or handle gracefully
        }
    }

    public function getUserAddress( int $user_id ): array
    {
        $db = $this->connectDB();
        $select = $db->prepare("SELECT ua.* 
                                FROM user_addresses ua
                                WHERE ua.user_id = :user_id;"); 
        $select->execute([':user_id' => $user_id]);
        $profileData = $select->fetch(PDO::FETCH_ASSOC);

        return $profileData ?: [];
    }

}