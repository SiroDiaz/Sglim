<?php 

require 'vendor/autoload.php';

use Noodlehaus\Config;
use App\Middlewares\Auth;

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
session_name('session');
session_start();

// Create Slim app
$app = new \Slim\App($config->get('app'));

$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function($c) {
    $view = new \Slim\Views\Twig(TEMPLATEPATH, [
        'cache' => BASEPATH .'/storage/cache'
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};

// Register PDO instance to Slim
$container['db'] = function($c) use ($config) {
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];

    try {
        $db = new PDO(
            sprintf(
                "%s:dbname=%s;host=%s;port=%s;charset=%s",
                $config->get('db.driver'),
                $config->get('db.database'),
                $config->get('db.host'),
                $config->get('db.port'),
                $config->get('db.charset')
            ),
            $config->get('db.username'),
            $config->get('db.password'),
            $options
        );
    } catch(PDOException $e) {
        echo $e->getMessage();
        exit;
    }

    return $db;
};

// Register middlewares
$app->add(Auth::class);

// Load all route files
foreach(glob(BASEPATH .'/App/Routes/*.route.php') as $route) {
    require $route;
}

$app->run();
