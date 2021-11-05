<?php

session_start();

use DI\Container;
use Slim\Factory\AppFactory;
use App\Models\Producteur;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Categorie;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Security\Cors;
use App\Controls\ControlAccueil;

require '../vendor/autoload.php';


$db = new Capsule();
$db->addConnection(parse_ini_file('../config/config.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$container = new Container();

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->add(new Cors());

$app->get('[/]', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlAccueil($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['route'] = $routeContext;
    return $control->afficherIndex($request, $responce, $parameters);
})->setName('Accueil');



$app->get('/producteur', function (Request $request, Response $responce, array $parameters) {
    $pr = new Producteur();
    $pr = $pr->all();
    $responce->getBody()->write('' . $pr);
    return $responce;
});

$app->get('/producteur/{name}', function (Request $request, Response $responce, array $parameters) {
    $pr = new Producteur();
    $name = $parameters['name'];
    $pr = $pr->findByName($name);
    $responce->getBody()->write('' . $pr);
    return $responce;
});

$app->get('/commande', function (Request $request, Response $responce, array $parameters) {
    $c = new Commande();
    $c = $c->all();
    $responce->getBody()->write('' . $c);
    return $responce;
});

$app->get('/commande/{id}', function (Request $request, Response $responce, array $parameters) {
    $c = new Commande();
    $id = $parameters['id'];
    $c = $c->findById($id);
    $responce->getBody()->write('' . $c);
    return $responce;
});

$app->get('/produit', function (Request $request, Response $responce, array $parameters) {
    $p = new Produit();
    $p = $p->all();
    $responce->getBody()->write('' . $p);
    return $responce;
});
$app->get('/categorie', function (Request $request, Response $responce, array $parameters) {
    $p = new Categorie();
    $p = $p->all();
    $responce->getBody()->write('' . $p);
    return $responce;
});

$app->get('/produit/{id}', function (Request $request, Response $responce, array $parameters) {
    $p = new Produit();
    $id = $parameters['id'];
    $p = $p->findById($id);
    $responce->getBody()->write('' . $p);
    return $responce;
});

$app->get('/produitbyproducteur/{id_producteur}', function (Request $request, Response $responce, array $parameters) {
    $p = new Produit();
    $id = $parameters['id_producteur'];
    $p = $p->query()->where('id_producteur', '=', $id)->get();
    $responce->getBody()->write('' . $p);
    return $responce;
});

$app->get('/produitbycategorie/{id_categorie}', function (Request $request, Response $responce, array $parameters) {
    $p = new Produit();
    $id = $parameters['id_categorie'];
    $p = $p->query()->where('id_categorie', '=', $id)->get();
    $responce->getBody()->write('' . $p);
    return $responce;
});

$app->post('/commandefromclient/{nom_client}/{mail_client}/{tel_client}/{montant}/{lieu_retrait}', function (Request $request, Response $responce, array $parameters) {
    $c = new Commande();
    //$c->id=$parameters['id'];
    $c->nom_client = $parameters['nom_client'];
    $c->mail_client = $parameters['mail_client'];
    $c->tel_client = $parameters['tel_client'];
    $c->montant = $parameters['montant'];
    $c->etat = 'en cours';
    $c->lieu_retrait = $parameters['lieu_retrait'];
    $c->save();
    $responce->getBody()->write('enregistrement ok');
    return $responce;
});


$app->run();
