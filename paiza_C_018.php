<?php
//レシピの行数を取得する
$N = trim(fgets(STDIN));

//レシピのデータを取得、名称をキーに、数量をValueに入れる
$recipie=[];
for($i=1;$i<=$N;$i++){
    $item = explode(" ",trim(fgets(STDIN)));
    $recipie[$item[0]]=$item[1];
}


//所有数の行数を取得する
$M = trim(fgets(STDIN));

//所有数のデータを取得、名称をキーに、数量をValueに入れる
$have = [];
for($i=1;$i<=$M;$i++){
    $itemhad = explode(" ",trim(fgets(STDIN)));
    $have[$itemhad[0]]=$itemhad[1];
}

//レシピのキーを所有数に探しに行き、キーがないものがあったらその時点で0を答えとしてかえしてbreak;
//所有数があったら割り算の結果をfloorして配列に返す
//そのうちのminを求めて答えに返す

$result=1;
foreach($recipie as $key => $value){
    if(array_key_exists($key,$have)){
        $recipie[$key] = floor($have[$key]/$recipie[$key]);
    } else {
        $result = 0;
        break;
    }
}


if($result == 0){
    echo 0;
} else {
    echo min($recipie);
}




?>