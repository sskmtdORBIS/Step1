<?php

//高さHと幅Wを取得する
$hw = explode(" ",trim(fgets(STDIN)));

//oを１xを０に置き換えながら配列に格納していく
for($i=0;$i<$hw[0];$i++){
    $hit = trim(fgets(STDIN));
    $hitint = str_replace(["o","x"],[1,0],$hit);
    $hitw = [];
    for($j=0;$j<$hw[1];$j++){
        $hitw[]=mb_substr($hitint,$j,1);
    }
    $hitmap[$i] = $hitw;
}

//得点を$hitmapと同じキーになるように多次元配列にする

for($i=0;$i<$hw[0];$i++){
    $scoreboard[] = explode(" ",trim(fgets(STDIN)));
}


//hitmapとscoreboardをかけながら足していく

for($i=0;$i<$hw[0];$i++){
    for($j=0;$j<$hw[1];$j++){
        $score += $hitmap[$i][$j]*$scoreboard[$i][$j];
    }
}

echo $score;
