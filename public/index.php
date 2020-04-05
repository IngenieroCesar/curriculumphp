<?php
//This index.php is called frontcontroller. His function is create a unique entry to our app
//this is how we tell php to show us errors
//This methos is not used to production mode.
ini_set('display_arrors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php'; 

use Illuminate\Database\Capsule\Manager as Capsule;
//Called AuraRouter :https://github.com/auraphp/Aura.Router/blob/3.x/docs/getting-started.md
use Aura\Router\RouterContainer;


$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'mysql',
    'database'  => 'curriculum',
    'username'  => 'root',
    'password'  => 'your_mysql_root_password',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

//Ctreate route container
$routerContainer = new RouterContainer();
//create route map
$map = $routerContainer->getMap();
//Create routes
$map->get('index', '/', '../index.php');
$map->get('addJobs', '/jobs/add', '../addJob.php');
$map->get('addProjects', '/projects/add', '../addPŕojects.php');
//this matcher compair our map with request
$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if(!$route){
    echo 'No Such Directory';
}else {
    require $route->handler;
}
