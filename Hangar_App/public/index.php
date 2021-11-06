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

require __DIR__ .'/../vendor/autoload.php';


$db = new Capsule();
$db->addConnection(parse_ini_file('../config/config.ini'));
$db->setAsGlobal();
$db->bootEloquent();
$enProd="/";
//Décommanter cette ligne quand on push sur webetu (oui je sais c'est moche)
$enProd="/www/franco377u/hangarLocal/Hangar_App/public/";

$container = new Container();

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->add(new Cors());

$app->get('/', function (Request $request, Response $responce, $parameters) {
    $responce->getBody()->write(' Hello World !');
    return $responce;
});
$app->get('/www/franco377u/hangarLocal/Hangar_App/public/', function (Request $request, Response $responce, $parameters) {
   $responce->getBody()->write(' Hello webetu');
    return $responce;
});

$app->get($enProd.'producteur', function (Request $request, Response $responce, $parameters) {
    $pr = new Producteur();
    $pr = $pr->all();
    $responce->getBody()->write('' . $pr);
    return $responce;
});

$app->get($enProd.'producteur/{name}', function (Request $request, Response $responce, $parameters) {
    $pr = new Producteur();
    $name = $parameters['name'];
    $pr = $pr->findByName($name);
    $responce->getBody()->write('' . $pr);
    return $responce;
});

$app->get($enProd.'commande', function (Request $request, Response $responce, $parameters) {
    $c = new Commande();
    $c = $c->all();
    $responce->getBody()->write('' . $c);
    return $responce;
});

$app->get($enProd.'commande/{id}', function (Request $request, Response $responce, $parameters) {
    $c = new Commande();
    $id = $parameters['id'];
    $c = $c->findById($id);
    $responce->getBody()->write('' . $c);
    return $responce;
});

$app->get($enProd.'produit', function (Request $request, Response $responce, $parameters) {
    $p = new Produit();
    $p = $p->all();
    $responce->getBody()->write('' . $p);
    return $responce;
});
$app->get($enProd.'categorie', function (Request $request, Response $responce, $parameters) {
    $p = new Categorie();
    $p = $p->all();
    $responce->getBody()->write('' . $p);
    return $responce;
});

$app->get($enProd.'produit/{id}', function (Request $request, Response $responce, $parameters) {
    $p = new Produit();
    $id = $parameters['id'];
    $p = $p->findById($id);
    $responce->getBody()->write('' . $p);
    return $responce;
});

$app->get($enProd.'produitbyproducteur/{id_producteur}', function (Request $request, Response $responce, $parameters) {
    $p = new Produit();
    $id = $parameters['id_producteur'];
    $p = $p->query()->where('id_producteur', '=', $id)->get();
    $responce->getBody()->write('' . $p);
    return $responce;
});

$app->get($enProd.'produitbycategorie/{nom_categorie}', function (Request $request, Response $responce, $parameters) {
    $p = new Produit();
    $c = new Categorie();
    $nom_categorie = $parameters['nom_categorie'];
    $id = $c->query()->where('nom', '=', $nom_categorie)->firstOrFail();
    $id = $id['id'];
    //echo $id;
    $p = $p->query()->where('id_categorie', '=', $id)->get();
    $responce->getBody()->write('' . $p);
    return $responce;
});

$app->post($enProd.'commandefromclient/{nom_client}/{mail_client}/{tel_client}/{montant}/{lieu_retrait}', function (Request $request, Response $responce, $parameters) {
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
    return $responce
    ->withHeader('Access-Control-Allow-Origin', 'https://webetu.iutnc.univ-lorraine.fr')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    ;
});


$app->post($enProd.'validatecommande/{id}', function (Request $request, Response $responce, $parameters) {
    $c = new Commande();
    $id=$parameters['id'];
    $c->query()->where('id', '=',$id)->firstOrFail();
    $c->etat = 'validé';
    $c->save();
    $responce->getBody()->write('enregistrement ok');
    return $responce
    ->withHeader('Access-Control-Allow-Origin', 'https://webetu.iutnc.univ-lorraine.fr')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    ;
});

$app->run();
