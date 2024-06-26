<?php

$checkID = ["a21","d21","d33","e53"];

$aList = ["a12","b14","d21"];
$bList = ["d13","e53","f10","k12"];
$cList = ["a21"];

$diffID = array_diff($checkID,$aList,$bList,$cList);
foreach ($diffID as $value){
    echo "{$value}は新規です。<br>";
}
?>