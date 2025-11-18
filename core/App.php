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
    }

    /**
     * Run the application
     */
    public function run() {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $this->router->dispatch($url);
    }
}
