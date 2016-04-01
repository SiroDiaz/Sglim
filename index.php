<?php 

require 'vendor/autoload.php';

define('ENVIRONMENT', 'development');   // production or development
// the path to route files
define('TEMPLATEPATH', dirname(__FILE__) .'/App/Routes/');

$config = null;

if(ENVIRONMENT === 'development') {
    // enable errors display
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    $config = Config::load('config/config_development.php');
} elseif(ENVIRONMENT === 'production') {
    // disable errors display
    ini_set('display_errors', 'Off');
    error_reporting(0);

    $config = Config::load('config/config_production.php');
} else {
    $config = Config::load('config/config_production.php');
    ini_set('display_errors', 'Off');
    error_reporting(0);
}

header_remove('X-Powered-By');

/**********************
 * START SESSION HERE *
**********************/
// session_name('session');
// session_start();

// Create Slim app
$app = new \Slim\App();
$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function($c) {
    $view = new \Slim\Views\Twig('App/Views', [
        'cache' => 'storage/cache'
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
};

// load the all route files
foreach(glob(TEMPLATEPATH .'*.route.php') as $route) {
    require_once $route;
}

$app->run();