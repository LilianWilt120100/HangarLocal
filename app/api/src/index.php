<?php
namespace src;
require "../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as DB;
use src\database\Eloquent as Eloquent;
use src\models\Producteur;

$db = new DB();
//print ("eloquent installé".'<br>');
$db->setAsGlobal();
$db->bootEloquent();
Eloquent::start(__DIR__.'/../conf/conf.ini.dist');
//print ("Eloquent démarré, connecté a la base".'<br>');


$arg = array(
    'nom' => 'Jean Michel deut',
    'localisation' => '22 rue de la Gare',
    'mail' => 'jm2@mail.fr',
);

$pEur = new Producteur;
//ERREUR impossible de store ou save : 
/*Fatal error: Uncaught TypeError: Argument 2 passed to str_contains() must be of the type string or null, array given, 
called in D:\laragon\www\HangarLocal\app\api\vendor\illuminate\database\Connection.php on line 666 
and defined in D:\laragon\www\HangarLocal\app\api\vendor\symfony\polyfill-php80\bootstrap.php:29 
Stack trace: #0 D:\laragon\www\HangarLocal\app\api\vendor\illuminate\database\Connection.php(666): 
str_contains('SQLSTATE[42S22]...', Array) 
#1 D:\laragon\www\HangarLocal\app\api\vendor\illuminate\database\Connection.php(645): 
Illuminate\Database\Connection->causedByLostConnection(Object(Illuminate\Database\QueryException)) 
#2 D:\laragon\www\HangarLocal\app\api\vendor\illuminate\database\Connection.php(585): 
Illuminate\Database\Connection->tryAgainIfCausedByLostConnection(Object(Illuminate\Database\QueryException), 
'insert into `Pr...', Array, 
Object(Closure)) #3 D:\laragon\www\HangarLocal\app\api\vendor\illuminate\database\Connection.php(363): 
Illuminate\Database\Connection->run('insert into `Pr...', Array, Objec in D:\laragon\www\HangarLocal\app\api\vendor\symfony\polyfill-php80\bootstrap.php on line 29
*/
$pEur->store($arg);

echo $pEur->findById(1);

/*
$pEur = new Producteur;
    $pEur->id=2;
    $pEur->nom='Jean Michel deut';
    $pEur->localisation='22 rue de la Gare';
    $pEur->mail='jm2@mail.fr';
    $pEur->save();
*/