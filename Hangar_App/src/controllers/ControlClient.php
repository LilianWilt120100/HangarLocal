<?php

namespace App\Controls;

use App\Vues\VueClient;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ControlClient {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }
}