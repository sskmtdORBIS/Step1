<?php

function testtest(&$value = 5){
    $value = $value * 2;
    return $value;
}

$hoge = 3;
$hogehoge = testtest($hoge);
echo $hogehoge;
echo "<br>";
echo $hoge;
?>