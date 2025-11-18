<?php
/**
 * Ad Model
 */

class Ad extends Model {
    protected $table = 'ads';

    /**
     * Get ad by position
     */
    public function getByPosition($position) {
        $sql = "SELECT * FROM ads WHERE position = ? AND active = 1";
        return $this->fetch($sql, [$position]);
    }

    /**
     * Get all active ads
     */
    public function getActive() {
        $sql = "SELECT * FROM ads WHERE active = 1 ORDER BY position";
        return $this->fetchAll($sql);
    }

    /**
     * Increment impressions
     */
    public function incrementImpressions($id) {
        $sql = "UPDATE ads SET impressions = impressions + 1 WHERE id = ?";
        return $this->query($sql, [$id]);
    }

    /**
     * Increment clicks
     */
    public function incrementClicks($id) {
        $sql = "UPDATE ads SET clicks = clicks + 1 WHERE id = ?";
        return $this->query($sql, [$id]);
    }

    /**
     * Get ad sizes
     */
    public static function getSizes() {
        return [
            'header' => ['width' => '728px', 'height' => '90px', 'label' => '728x90'],
            'sidebar-top' => ['width' => '300px', 'height' => '250px', 'label' => '300x250'],
            'sidebar-middle' => ['width' => '300px', 'height' => '600px', 'label' => '300x600'],
            'sidebar-bottom' => ['width' => '300px', 'height' => '250px', 'label' => '300x250'],
            'in-feed' => ['width' => '728px', 'height' => '90px', 'label' => '728x90'],
            'mid-article' => ['width' => '728px', 'height' => '90px', 'label' => '728x90'],
            'pre-footer' => ['width' => '728px', 'height' => '90px', 'label' => '728x90'],
            'footer' => ['width' => '728px', 'height' => '90px', 'label' => '728x90'],
        ];
    }
}
