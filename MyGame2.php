<?php
require_once("GameBook.php");
class MyGame implements GameBook{
    public int $hitPoint = 0;

    function __construct (int $coins = 1){
        $startPoint = 100 * $coins;
        $this->newGame($startPoint);
    }

    public function newGame(int $point){
        $this->myPoint = $point;
        echo "スタート：{$point}ポイント".PHP_EOL;
    }

    public function play(){
        $num = random_int(0,100);
        if ($num%2 == 0){
            echo "＋{$num}↑";
            $this->myPoint += $num;
        } else {
            echo "ー{$num}↓";
            $this->myPoint -= $num;
        }
        echo "現在{$this->myPoint}ポイント".PHP_EOL;
    }

    public function isAlive():bool{
        return ($this->myPoint > 0);
    }
}

//?>