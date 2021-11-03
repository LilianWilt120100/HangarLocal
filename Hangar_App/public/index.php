<?php

session_start();

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';

$db = new Capsule();
$db->addConnection('/../config/config.ini');
$db->setAsGlobal();
$db->bootEloquent();

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $responce, $parameters) {
    $responce->getBody()->write(' Hello World !');
    return $responce;
});

$app->run();