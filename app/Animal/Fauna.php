<?php

namespace App\Animal;

class Fauna implements FaunaInterface {
    protected $name;
    protected $type;

    public function __construct($name, $type) {
        $this->name = $name;
        $this->type = $type;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function greeting() {
        return "Welcome to the world of " . $this->name . "!";
    }
}