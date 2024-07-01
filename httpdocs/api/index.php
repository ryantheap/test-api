<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS, PATCH');
date_default_timezone_set('Europe/Paris');

$baseURL = '/../../';
$baseURLAPI = '/../../app/';

require __DIR__ . $baseURL . 'vendor/autoload.php';

use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Middleware\RequestBodyParserMiddleware;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use Slim\Psr7\Request; // Ajout de cette ligne pour importer la classe Request
use Dotenv\Dotenv;

require_once __DIR__ . $baseURLAPI . 'Controllers/DotEnvEnvironment.php';
(new App\Controllers\DotEnvEnvironment)->load(__DIR__ . $baseURLAPI);

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);
$app->setBasePath("/api");
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();


use App\Controllers\{
  UsersController
};

$usersController = new UsersController();


// USER
$app->get('/users', array($usersController, 'getUsers'));
$app->post('/users', array($usersController, 'postUsers'));
$app->patch('/users', array($usersController, 'patchUsers'));
$app->delete('/users', array($usersController, 'deleteUsers'));


try {
    $app->run();     
} catch (Exception $e) {    
  // We display a error message
  die( json_encode(array("status" => "failed", "message" => "This action is not allowed"))); 
}

?>