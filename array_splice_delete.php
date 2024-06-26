<?php

$myArray = ["a","b","c","d","e"];

array_splice($myArray,1,2);
echo '実行後：$myArray',PHP_EOL;
$print = print_r($myArray);

echo $print;
?>