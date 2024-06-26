<?php
    $N = trim(fgets(STDIN));
    $data = trim(fgets(STDIN));
    $data = str_replace(array("\r","\n","\r\n"),'',$data);
    $test = explode(" ",$data);
    sort($test);
    array_shift($test);
    array_pop($test);
    foreach($test as $value){
        $sum += $value;
    }
    $average = (floor(($sum / ($N - 2))*10))/10 ;
    printf('%.1f',$average);
    echo PHP_EOL;
?>