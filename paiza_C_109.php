<?php
//予約件数N 縦H横W 最も見やすい位置P,Qを取得する
$NHWPQ = explode(" ",trim(fgets(STDIN)));

//座席表の多次元配列を作り、keyに座席番号を持たせ、PQとのマンハッタン距離を格納する（X）

$sheets = [];

for($i=0;$i<$NHWPQ[1];$i++){
    for($j=0;$j<$NHWPQ[2];$j++){
        $sheets[$i][$j] = abs($NHWPQ[3]-$i) + abs($NHWPQ[4]-$j);
    }
}

//予約ずみ座席をN件呼び出し、Xからデータを削除する
for($i=0;$i<$NHWPQ[0];$i++){
    $resurved = explode(" ",trim(fgets(STDIN)));
    unset($sheets[$resurved[0]][$resurved[1]]);
}



//残りのXの最小値を呼び出し、回答に入れる


$Wmin = [];
foreach($sheets as $array){
    if($array == null){
        continue;
    }
    $Wmin[] = min($array);
}

$min = min($Wmin);


foreach($sheets as $keyH => $array){
    foreach($array as $keyW => $value){
        if($value == $min){
            echo "{$keyH} {$keyW}",PHP_EOL;
        }
    }
}


?>