<?php

//列数＝有料課金データ数の取得
$N = trim(fgets(STDIN));

//課金データの配列化
$chargedata = explode(" ",trim(fgets(STDIN)));

//配列データを順番に呼び出し、呼び出されたvalueをkeyとして１を足していく
$count = [];

foreach($chargedata as $value){
    $count[$value] += 1;
}

//最大値を求めそれに合致するkeyを呼び出す
$max = max($count);
$result = array_keys($count,$max);
asort($result);
echo implode(" ",$result);
?>