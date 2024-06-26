<?php

class Staff {
    public string $name;
    public int $age;

    function __construct(string $name, int $age){
        $this->name = $name;
        $this->age = $age;
    }

    public function hello(){
        if(is_null($this->name)){
            echo "こんにちは！".PHP_EOL;
        } else {
            echo "こんにちは、{$this->name}です。{$this->age}です。".PHP_EOL;
        }
    }
}

$hana = new Staff("hana",21);

$hana->hello();




?>