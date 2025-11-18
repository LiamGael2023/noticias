<?php
/**
 * Category Model
 */

class Category extends Model {
    protected $table = 'categories';

    /**
     * Get category by slug
     */
    public function getBySlug($slug) {
        return $this->findBy('slug', $slug);
    }

    /**
     * Get all categories with news count
     */
    public function getAllWithCount() {
        $sql = "SELECT c.*, COUNT(n.id) as news_count
                FROM categories c
                LEFT JOIN news n ON c.id = n.category_id
                GROUP BY c.id
                ORDER BY c.name ASC";

        return $this->fetchAll($sql);
    }

    /**
     * Get category with news count
     */
    public function getWithCount($id) {
        $sql = "SELECT c.*, COUNT(n.id) as news_count
                FROM categories c
                LEFT JOIN news n ON c.id = n.category_id
                WHERE c.id = ?
                GROUP BY c.id";

        return $this->fetch($sql, [$id]);
    }
}
