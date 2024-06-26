<?php

require_once("Player.php");
class Soccer extends Player {
    public function play(){
        echo "{$this->name}がシュート！".PHP_EOL;
    }
}

//?>