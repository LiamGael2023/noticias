<?php
/**
 * Router Class
 * Handles URL routing
 */

class Router {
    private $routes = [];
    private $params = [];

    /**
     * Add a route
     */
    public function add($route, $params = []) {
        // Convert route to regex
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z0-9-]+)', $route);
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    /**
     * Match URL to routes
     */
    public function match($url) {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Dispatch the route
     */
    public function dispatch($url) {
        $url = $this->removeQueryString($url);

        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller) . 'Controller';

            $controllerFile = CONTROLLERS_PATH . $controller . '.php';

            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controllerObject = new $controller();

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (method_exists($controllerObject, $action)) {
                    unset($this->params['controller']);
                    unset($this->params['action']);

                    call_user_func_array([$controllerObject, $action], $this->params);
                } else {
                    $this->error404("Method $action not found in controller $controller");
                }
            } else {
                $this->error404("Controller $controller not found");
            }
        } else {
            $this->error404("No route matched for URL: $url");
        }
    }

    /**
     * Convert to StudlyCaps
     */
    private function convertToStudlyCaps($string) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * Convert to camelCase
     */
    private function convertToCamelCase($string) {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    /**
     * Remove query string from URL
     */
    private function removeQueryString($url) {
        if ($url != '') {
            $parts = explode('&', $url, 2);
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }
        return rtrim($url, '/');
    }

    /**
     * Show 404 error
     */
    private function error404($message = '') {
        http_response_code(404);
        require_once VIEWS_PATH . 'layouts/404.php';
        exit;
    }

    /**
     * Get params
     */
    public function getParams() {
        return $this->params;
    }
}
