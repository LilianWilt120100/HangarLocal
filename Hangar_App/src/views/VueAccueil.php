<?php

namespace App\Vues;

class IndexVue {

    private $container;
    private $data;

    public function __construct($container, array $data = null) {
        $this->container = $container;
        $this->data = $data;
    }
}

