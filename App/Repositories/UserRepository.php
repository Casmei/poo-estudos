<?php

namespace App\Repositories;

use SQLite3;
use App\Models\User;

class UserRepository
{
    private SQLite3 $db;

    public function __construct()
    {
        $this->db = new SQLite3(__DIR__ . '/../../database/database.sqlite');
    }

    public function create(string $name, string $email): ?User
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':email', $email, SQLITE3_TEXT);

        if ($stmt->execute()) {
            return new User(['id' => $this->db->lastInsertRowID(), 'name' => $name, 'email' => $email]);
        }

        return null;
    }

    public function findAll(): array
    {
        $result = $this->db->query("SELECT * FROM users");
        $users = [];

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $users[] = new User($row);
        }

        return $users;
    }
}
