<?php

session_start();

use Slim\Factory\AppFactory;
use App\Models\Producteur;
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

<<<<<<< Updated upstream
$app->add(new cors());

$app->get('/', function (Request $request, Response $responce, $parameters) {
    $responce->getBody()->write(' Hello World !');
    return $responce;
});

=======
>>>>>>> Stashed changes
$app->get('/producteur', function (Request $request, Response $responce, $parameters) {
    $pr = new Producteur();
    $pr = $pr->findById(1);
    $responce->getBody()->write(''.$pr);
    return $responce
        
;
});

$app->run();