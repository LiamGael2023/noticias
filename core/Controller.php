<?php
/**
 * Base Controller Class
 * All controllers extend this class
 */

class Controller {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Load a model
     */
    protected function model($model) {
        $modelFile = MODELS_PATH . $model . '.php';
        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $model();
        }
        return null;
    }

    /**
     * Load a view with data
     */
    protected function view($view, $data = []) {
        // Extract data to variables
        extract($data);

        $viewFile = VIEWS_PATH . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die("View not found: " . $view);
        }
    }

    /**
     * Redirect to another URL
     */
    protected function redirect($url) {
        header("Location: " . APP_URL . $url);
        exit;
    }

    /**
     * Return JSON response
     */
    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
