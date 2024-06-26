<?php
$b = array ('m' => 'monkey', 'foo' => 'bar', 'x' => array ('x', 'y', 'z'));
$results = print_r($b,true); // print_r の結果が $results に格納されます
echo $results;
?>