<?php
//電話番号を取得し、ハイフンを除去する
$number = str_replace("-","",trim(fgets(STDIN)));

//番号に対する距離の配列をキー：番号、value：距離として作る

$list[0]=12;
for($i=1;$i<=9;$i++){
    $list[$i] = $i+2;
}


//電話番号の文字列数を算出する
$N = strlen($number);

//文字数分listから距離を取り出しforで合計する

$result = 0;
for($i=0;$i<$N;$i++){
    $digit = mb_substr($number,$i,1);
    $direction = $list[$digit]*2;
    $result += $direction;
}

echo $result,PHP_EOL;

?>