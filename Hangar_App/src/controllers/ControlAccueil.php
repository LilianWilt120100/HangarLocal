<?php

namespace App\Controls;

use App\Vues\IndexVue;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ControlAccueil {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

}