<?php
require_once("WorldRule.php");

class MyClass implements WorldRule{

    public function hello(){
        echo "こんにちは！".PHP_EOL;
    }

    public function thanks(){
        echo "ありがとう！".PHP_EOL;
    }
}

//?>