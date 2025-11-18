<?php
/**
 * Configuration file for NoticiasInvestiga
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_PORT', '3307');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'noticias_investiga');

// Application Configuration
define('APP_NAME', 'NoticiasInvestiga');
define('APP_DESC', 'Periodismo de Investigación');
define('APP_URL', 'http://localhost/noticiasweb');
define('APP_ROOT', dirname(dirname(__FILE__)));

// Path Configuration
define('CONTROLLERS_PATH', APP_ROOT . '/app/controllers/');
define('MODELS_PATH', APP_ROOT . '/app/models/');
define('VIEWS_PATH', APP_ROOT . '/app/views/');
