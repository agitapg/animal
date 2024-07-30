<?php

namespace App\Animal;

class Mammals extends Fauna {
    public function __construct() {
        parent::__construct("Mammals", "Vivipar");
    }

    public function greeting() {
        return "Mammals are vivipar!";
    }
}