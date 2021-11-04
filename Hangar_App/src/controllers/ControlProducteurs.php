<?php

namespace App\Controls;
use App\Models\Producteur;
use App\views\ProducteurView;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Log\LoggerInterface;
use DI\Container as Container;


class ControlProducteurs {

    private $c = null;

    function __construct(Container $c){
        $this->c = $c;
    }

    function displayProducteur (Request $rq, Response $rs, array $args): Response{
        session_start();
        $product_id = $args['id'];
        $htmlvars = ['inscription'];

        try{
            $producteur = Producteur::query()->where('id', '=', $product_id)
                ->firstOrFail();
        
        }
        catch (ModelNotFoundException $e){
            $rs->getBody()->write("producteur {$product_id} non trouvé");
            return $rs;
        }

        $v= new ProducteurView([0]);

        $rs->getBody()->write($v->render($htmlvars));
        return $rs;
    }
        
}