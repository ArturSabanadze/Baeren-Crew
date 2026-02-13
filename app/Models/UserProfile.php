<?php

namespace App\Models;
use App\Traits\DB_Connection;
use PDO;
use PDOException;

class UserProfile
{
    use DB_Connection;

    public function getUserProfile( int $user_id ): array
    {
        $db = $this->connectDB();
        $select = $db->prepare("SELECT up.*
                                FROM user_profiles up
                                WHERE up.user_id = :user_id;");
        $select->execute([':user_id' => $user_id]);
        $profileData = $select->fetch(PDO::FETCH_ASSOC);

        return $profileData ?: [];
    }

    public function saveProfile(int $user_id, array $profileData): void
    {
        $db = $this->connectDB();
        $insert = $db->prepare("
            INSERT INTO user_profiles 
            (user_id, name, surname, gender, birthdate, phone, biography, profile_img_url)
            VALUES (:user_id, :name, :surname, :gender, :birthdate, :phone, :biography, :profile_img_url);
        ");
        $insert->execute([
            ':user_id' => $user_id,
            ':name' => $profileData['name'],
            ':surname' => $profileData['surname'],
            ':gender' => $profileData['gender'],
            ':birthdate' => $profileData['birthdate'],
            ':phone' => $profileData['phone'],
            ':biography' => $profileData['biography'],
            ':profile_img_url' => $profileData['profile_img_url']
        ]);
    }

    public function updateProfile(int $user_id, array $data): void
        {
            if (!$data) {
            return; // nothing to update
            }

        $pdo = $this->connectDB();

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

        // Nothing to update
        if (!$fields) {
            return;
        }

        $sql = 'UPDATE user_profiles SET ' . implode(', ', $fields) . ' WHERE user_id = :user_id';

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
        } catch (PDOException $e) {
            error_log('Update user profile failed: ' . $e->getMessage());
            throw $e; // optionally rethrow or handle gracefully
        }
    }

}