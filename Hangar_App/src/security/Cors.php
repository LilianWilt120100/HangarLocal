<?php

namespace App\Security;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class Cors {
    /**
     * Check if the user is not logged in to continue
     *
     * @param Request $request PSR-7 request
     * @param RequestHandler $handler PSR-15 request handler
     *
     * @return ResponseInterface
     */
    public function __invoke(Request $request, RequestHandler $handler): ResponseInterface
    {
        $response = $handler->handle($request);
            
        $allowedOrigins = [
        'https://webetu.iutnc.univ-lorraine.fr',
        'http://127.0.0.1:5500' ,
        ];

        $uri = $request->getUri();
        $host = $uri->getHost();
        if ($host =='localhost') {
            $http_origin = $allowedOrigins[1];
        } else {
            $http_origin = $allowedOrigins[0];
        }
        


        return $response
            ->withHeader('Access-Control-Allow-Origin', $http_origin)
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }
}