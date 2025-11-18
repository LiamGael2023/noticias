<?php
/**
 * Base Model Class
 * All models extend this class
 */

class Model {
    protected $db;
    protected $table;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Get all records
     */
    public function all($orderBy = 'created_at DESC') {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$orderBy}";
        return $this->db->fetchAll($sql);
    }

    /**
     * Find record by ID
     */
    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->db->fetch($sql, [$id]);
    }

    /**
     * Find record by column
     */
    public function findBy($column, $value) {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} = ?";
        return $this->db->fetch($sql, [$value]);
    }

    /**
     * Find all records by column
     */
    public function findAllBy($column, $value, $orderBy = 'created_at DESC') {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} = ? ORDER BY {$orderBy}";
        return $this->db->fetchAll($sql, [$value]);
    }

    /**
     * Create new record
     */
    public function create($data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $this->db->query($sql, array_values($data));
        return $this->db->lastInsertId();
    }

    /**
     * Update record
     */
    public function update($id, $data) {
        $set = implode(' = ?, ', array_keys($data)) . ' = ?';
        $sql = "UPDATE {$this->table} SET {$set} WHERE id = ?";
        $values = array_values($data);
        $values[] = $id;
        return $this->db->query($sql, $values);
    }

    /**
     * Delete record
     */
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }

    /**
     * Count records
     */
    public function count($where = null, $params = []) {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        if ($where) {
            $sql .= " WHERE {$where}";
        }
        $result = $this->db->fetch($sql, $params);
        return $result['total'];
    }

    /**
     * Custom query
     */
    public function query($sql, $params = []) {
        return $this->db->query($sql, $params);
    }

    /**
     * Fetch all with custom query
     */
    public function fetchAll($sql, $params = []) {
        return $this->db->fetchAll($sql, $params);
    }

    /**
     * Fetch one with custom query
     */
    public function fetch($sql, $params = []) {
        return $this->db->fetch($sql, $params);
    }
}
