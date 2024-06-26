<?php

//当たり番号を配列化する

$winning = explode(" ",trim(fgets(STDIN)));

//くじの枚数を取得する

$N = trim(fgets(STDIN));

//判定関数を作る

function judge ($value,$array){
    global $count;
    if(in_array($value,$array)){
        $count += 1;
    }
}

//くじごとの$resultを求める

for($i=0;$i<$N;$i++){
    $count = 0;
    $lot = explode(" ",trim(fgets(STDIN))); 
    foreach($winning as $value){
        judge($value,$lot);
    }
    echo $count,PHP_EOL;
}


?>