<?php

class Staff {

    function __construct(public string $name,public int $age){
    }

    public function hello(){
        if(is_null($this->name)){
            echo "こんにちは！".PHP_EOL;
        } else {
            echo "こんにちは、{$this->name}です！{$this->age}です！".PHP_EOL;
        }
    }
}
//?>