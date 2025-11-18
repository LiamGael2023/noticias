<?php
/**
 * News Model
 */

class News extends Model {
    protected $table = 'news';

    /**
     * Get all news with category
     */
    public function getAllWithCategory($limit = null) {
        $sql = "SELECT n.*, c.name as category_name, c.slug as category_slug, c.color as category_color
                FROM news n
                LEFT JOIN categories c ON n.category_id = c.id
                ORDER BY n.created_at DESC";

        if ($limit) {
            $sql .= " LIMIT " . (int)$limit;
        }

        return $this->fetchAll($sql);
    }

    /**
     * Get featured news
     */
    public function getFeatured($limit = 3) {
        $sql = "SELECT n.*, c.name as category_name, c.slug as category_slug, c.color as category_color
                FROM news n
                LEFT JOIN categories c ON n.category_id = c.id
                WHERE n.featured = 1
                ORDER BY n.created_at DESC
                LIMIT " . (int)$limit;

        return $this->fetchAll($sql);
    }

    /**
     * Get news by slug with category
     */
    public function getBySlug($slug) {
        $sql = "SELECT n.*, c.name as category_name, c.slug as category_slug, c.color as category_color
                FROM news n
                LEFT JOIN categories c ON n.category_id = c.id
                WHERE n.slug = ?";

        return $this->fetch($sql, [$slug]);
    }

    /**
     * Get news by category
     */
    public function getByCategory($categoryId, $excludeId = null) {
        $sql = "SELECT n.*, c.name as category_name, c.slug as category_slug, c.color as category_color
                FROM news n
                LEFT JOIN categories c ON n.category_id = c.id
                WHERE n.category_id = ?";

        $params = [$categoryId];

        if ($excludeId) {
            $sql .= " AND n.id != ?";
            $params[] = $excludeId;
        }

        $sql .= " ORDER BY n.created_at DESC";

        return $this->fetchAll($sql, $params);
    }

    /**
     * Get related news
     */
    public function getRelated($categoryId, $excludeId, $limit = 3) {
        $sql = "SELECT n.*, c.name as category_name, c.slug as category_slug, c.color as category_color
                FROM news n
                LEFT JOIN categories c ON n.category_id = c.id
                WHERE n.category_id = ? AND n.id != ?
                ORDER BY n.created_at DESC
                LIMIT " . (int)$limit;

        return $this->fetchAll($sql, [$categoryId, $excludeId]);
    }

    /**
     * Get recent news
     */
    public function getRecent($limit = 5) {
        $sql = "SELECT n.*, c.name as category_name, c.slug as category_slug, c.color as category_color
                FROM news n
                LEFT JOIN categories c ON n.category_id = c.id
                ORDER BY n.created_at DESC
                LIMIT " . (int)$limit;

        return $this->fetchAll($sql);
    }

    /**
     * Increment views
     */
    public function incrementViews($id) {
        $sql = "UPDATE news SET views = views + 1 WHERE id = ?";
        return $this->query($sql, [$id]);
    }

    /**
     * Search news
     */
    public function search($term) {
        $sql = "SELECT n.*, c.name as category_name, c.slug as category_slug, c.color as category_color
                FROM news n
                LEFT JOIN categories c ON n.category_id = c.id
                WHERE n.title LIKE ? OR n.excerpt LIKE ? OR n.content LIKE ?
                ORDER BY n.created_at DESC";

        $term = "%{$term}%";
        return $this->fetchAll($sql, [$term, $term, $term]);
    }

    /**
     * Get non-featured news
     */
    public function getNonFeatured() {
        $sql = "SELECT n.*, c.name as category_name, c.slug as category_slug, c.color as category_color
                FROM news n
                LEFT JOIN categories c ON n.category_id = c.id
                WHERE n.featured = 0
                ORDER BY n.created_at DESC";

        return $this->fetchAll($sql);
    }
}
