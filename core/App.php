<?php
/**
 * Application Class
 * Main application bootstrap
 */

class App {
    private $router;

    public function __construct() {
        $this->router = new Router();
        $this->setupRoutes();
    }

    /**
     * Setup application routes
     */
    private function setupRoutes() {
        // Home
        $this->router->add('', ['controller' => 'home', 'action' => 'index']);
        $this->router->add('home', ['controller' => 'home', 'action' => 'index']);

        // News
        $this->router->add('noticia/{slug}', ['controller' => 'news', 'action' => 'show']);

        // Categories
        $this->router->add('categoria/{slug}', ['controller' => 'category', 'action' => 'show']);

        // Search
        $this->router->add('buscar', ['controller' => 'home', 'action' => 'search']);

        // Admin Auth
        $this->router->add('admin/login', ['controller' => 'auth', 'action' => 'login']);
        $this->router->add('admin/logout', ['controller' => 'auth', 'action' => 'logout']);

        // Admin Dashboard
        $this->router->add('admin', ['controller' => 'admin', 'action' => 'index']);

        // Admin News
        $this->router->add('admin/news', ['controller' => 'admin', 'action' => 'news']);
        $this->router->add('admin/news/create', ['controller' => 'admin', 'action' => 'newsCreate']);
        $this->router->add('admin/news/store', ['controller' => 'admin', 'action' => 'newsStore']);
        $this->router->add('admin/news/edit/{id}', ['controller' => 'admin', 'action' => 'newsEdit']);
        $this->router->add('admin/news/update/{id}', ['controller' => 'admin', 'action' => 'newsUpdate']);
        $this->router->add('admin/news/delete/{id}', ['controller' => 'admin', 'action' => 'newsDelete']);

        // Admin Categories
        $this->router->add('admin/categories', ['controller' => 'admin', 'action' => 'categories']);
        $this->router->add('admin/categories/store', ['controller' => 'admin', 'action' => 'categoryStore']);
        $this->router->add('admin/categories/update/{id}', ['controller' => 'admin', 'action' => 'categoryUpdate']);
        $this->router->add('admin/categories/delete/{id}', ['controller' => 'admin', 'action' => 'categoryDelete']);

        // Admin Ads
        $this->router->add('admin/ads', ['controller' => 'admin', 'action' => 'ads']);
        $this->router->add('admin/ads/update/{id}', ['controller' => 'admin', 'action' => 'adUpdate']);
    }

    /**
     * Run the application
     */
    public function run() {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $this->router->dispatch($url);
    }
}
