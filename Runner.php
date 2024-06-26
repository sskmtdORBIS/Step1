<?php
require_once("Player.php");

class Runner extends Player{
    function __construct(string$name,public int $age){
        parent::__construct($name);
    }

    public function who(){
        echo "{$this->name}、{$this->age}歳です。".PHP_EOL;
    }

    public function play(){
        echo "{$this->name}がはしる！".PHP_EOL;
    }
}

//?>