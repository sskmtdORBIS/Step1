<?php

$myArray = ["a","b","c","d","e","f"];

$replacement = ["x","y","z"];

$removed = array_splice($myArray,0,0,$replacement);

echo '実行後：$myArray',PHP_EOL;
print_r($myArray);
echo '戻り：$removed',PHP_EOL;
print_r($removed);
?>