<?php
/**
 * NoticiasInvestiga - Entry Point
 * PHP MVC News Investigation Website
 */

// Start session
session_start();

// Load configuration
require_once __DIR__ . '/../config/config.php';

// Load core classes
require_once APP_ROOT . '/core/Database.php';
require_once APP_ROOT . '/core/Controller.php';
require_once APP_ROOT . '/core/Model.php';
require_once APP_ROOT . '/core/Router.php';
require_once APP_ROOT . '/core/App.php';

// Load models (needed for partials)
require_once MODELS_PATH . 'Category.php';
require_once MODELS_PATH . 'News.php';
require_once MODELS_PATH . 'Ad.php';

// Initialize and run application
$app = new App();
$app->run();
