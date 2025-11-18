<?php
/**
 * User Model
 */

class User extends Model {
    protected $table = 'users';

    /**
     * Find user by username
     */
    public function findByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = ? AND active = 1";
        return $this->fetch($sql, [$username]);
    }

    /**
     * Find user by email
     */
    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ? AND active = 1";
        return $this->fetch($sql, [$email]);
    }

    /**
     * Verify password
     */
    public function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    /**
     * Create new user
     */
    public function create($data) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password, name, role) VALUES (?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['username'],
            $data['email'],
            $data['password'],
            $data['name'],
            $data['role'] ?? 'author'
        ]);
    }

    /**
     * Update user
     */
    public function update($id, $data) {
        $fields = [];
        $params = [];

        if (isset($data['name'])) {
            $fields[] = "name = ?";
            $params[] = $data['name'];
        }
        if (isset($data['email'])) {
            $fields[] = "email = ?";
            $params[] = $data['email'];
        }
        if (isset($data['password']) && !empty($data['password'])) {
            $fields[] = "password = ?";
            $params[] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        if (isset($data['role'])) {
            $fields[] = "role = ?";
            $params[] = $data['role'];
        }
        if (isset($data['active'])) {
            $fields[] = "active = ?";
            $params[] = $data['active'];
        }

        if (empty($fields)) return false;

        $params[] = $id;
        $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = ?";
        return $this->query($sql, $params);
    }

    /**
     * Get all users
     */
    public function getAll() {
        $sql = "SELECT id, username, email, name, role, active, created_at FROM users ORDER BY created_at DESC";
        return $this->fetchAll($sql);
    }
}
