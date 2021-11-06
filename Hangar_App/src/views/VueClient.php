<?php

namespace App\Vues;

class VueClient {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function render(Array $parameters) {
    }
}