<?php

$valuelist = [10,4,-8,9];

$sum = 0;

foreach($valuelist as $value){
    if($value>=0){
    $sum += $value;
    }
}

echo "合計は{$sum}です。";

?>