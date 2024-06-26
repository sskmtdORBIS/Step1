<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $s = trim(fgets(STDIN));
    $array = explode(" ",$s);
    foreach($array as $value){
    echo $value,PHP_EOL;
    }
?>