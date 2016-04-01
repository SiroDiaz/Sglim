<?php 

require 'vendor/autoload.php';

use Noodlehaus\Config;

define('ENVIRONMENT', 'development');   // production or development
// the path to route files
define('TEMPLATEPATH', dirname(__FILE__) .'/App/Views');
define('BASEPATH', dirname(__FILE__));

$config = null;

if(ENVIRONMENT === 'development') {
    // enable errors display
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    $config = Config::load(BASEPATH .'/config/config_development.php');
} elseif(ENVIRONMENT === 'production') {
    // disable errors display
    ini_set('display_errors', 'Off');
    error_reporting(0);

    $config = Config::load(BASEPATH .'/config/config_production.php');
} else {
    $config = Config::load(BASEPATH .'/config/config_production.php');
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
$app = new \Slim\App($config->get('app'));

$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function($c) {
    $view = new \Slim\Views\Twig(TEMPLATEPATH, [
        'cache' => 'storage/cache'
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};

// load the all route files
foreach(glob(BASEPATH .'/App/Routes/*.route.php') as $route) {
    require $route;
}

$app->run();