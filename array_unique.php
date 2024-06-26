<?php

$a = ["a","b","c","d"];
$b = ["b","d","g"];
$c = ["a","n","k","l","d","w","3"];

$all = array_merge($a,$b,$c);

$unique = array_unique($all);

print_r($all);
print_r($unique);

?>