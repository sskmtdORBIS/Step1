<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = fgets(STDIN);
    
    $data = fgets(STDIN);
    $data = str_replace(array("\n","\r","\r\n"),'',$data);
    $data =explode(" ",$data);
    sort($data);
    $sum = 0;
    for($i = 1; $i <= $input_line - 2; $i++){
        $sum += $data[$i];
    }
    $average = $sum / ($input_line - 2);
    printf('%.1f',$average);
    echo PHP_EOL;
?>