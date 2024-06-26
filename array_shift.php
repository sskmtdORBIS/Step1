<?php

$myArray = ["a","b","c","d","e"];

$removed = array_shift($myArray);

echo '実行後：$myArray',PHP_EOL;
print_r($myArray);
echo '戻り：$removed',PHP_EOL;
print_r($removed);
?>