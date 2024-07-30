<?php

namespace App\Animal;

class Poultry extends Fauna {
    public function __construct() {
        parent::__construct("Poultry", "Ovipar");
    }

    public function greeting() {
        return "Poultry are ovipar!";
    }
}