<?php

session_start();

use Slim\Factory\AppFactory;
use App\Models\Producteur;
use App\Models\Commande;
use App\Models\Produit;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Cors\cors;

require '../vendor/autoload.php';


$db = new Capsule();
$db->addConnection(parse_ini_file('../config/config.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$app = AppFactory::create();

$app->add(new cors());

$app->get('/', function (Request $request, Response $responce, $parameters) {
    $responce->getBody()->write(' Hello World !');
    return $responce;
});

$app->get('/producteur', function (Request $request, Response $responce, $parameters) {
    $pr = new Producteur();
    $pr = $pr->all();
    $responce->getBody()->write(''.$pr);
    return $responce;
        
});

$app->get('/producteur/{id}', function (Request $request, Response $responce, $parameters) {
    $pr = new Producteur();
    $id = $parameters['id'];
    $pr = $pr->findById($id);
    $responce->getBody()->write(''.$pr);
    return $responce;
        
});

$app->get('/commande', function (Request $request, Response $responce, $parameters) {
    $c = new Commande();
    $c = $c->all();
    $responce->getBody()->write(''.$c);
    return $responce;
        
});

$app->get('/commande/{id}', function (Request $request, Response $responce, $parameters) {
    $c = new Commande();
    $id = $parameters['id'];
    $c = $c->findById($id);
    $responce->getBody()->write(''.$c);
    return $responce;
        
});

$app->get('/produit', function (Request $request, Response $responce, $parameters) {
    $p = new Produit();
    $p = $p->all();
    $responce->getBody()->write(''.$p);
    return $responce;
        
});

$app->get('/produit/{id}', function (Request $request, Response $responce, $parameters) {
    $p = new Produit();
    $id = $parameters['id'];
    $p = $p->findById($id);
    $responce->getBody()->write(''.$p);
    return $responce;
        
});


$app->run();