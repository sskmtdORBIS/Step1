<?php

require_once("MyGame2.php");

$myPlayer = new Mygame(coins:1);
for ($i=0; $i<10; $i++){
    $kai = $i +1;
    echo"{$kai}回目:";
    $myPlayer->play();
    if (! $myPlayer->isAlive()){
        break;
    }
}
echo "ゲーム終了".PHP_EOL;

?>