<?php
$myFunc = function($who){
    echo"{$who}さん、こんにちは！<br><br>";
};

$myFunc("松枝");

?>

<?php


$msg= "さようなら";

$myFunc2 = function($who) use ($msg) {
    echo"{$who}さん、".$msg, PHP_EOL;
};

$msg = "ありがとう";

$myFunc2("田中");

?>
