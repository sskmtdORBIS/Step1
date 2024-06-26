<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = fgets(STDIN);
    $input_line2 = fgets(STDIN);
    $test = explode(" ",$input_line2);
    sort($test);
    array_shift($test);
    array_pop($test);
    foreach($test as $value){
        $sum += $value;
    }
    $sum = round($sum / ($input_line - 2) ,1,PHP_ROUND_HALF_DOWN);
    echo $sum;
?>