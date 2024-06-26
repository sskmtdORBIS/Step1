<?php

//作業回数nと作物数mを取得する
$nm = explode(" ",trim(fgets(STDIN)));


//行数（h）と列数（w）を取得する
$hw = explode(" ",trim(fgets(STDIN)));


//多重配列で畑の初期状態を示す
$hatake = [];
$retsu = [];
for($i=1;$i<=$hw[0];$i++){
    for($j=1;$j<=$hw[1];$j++){
        $retsu[$j] = ".";
    }
    $hatake[$i] = $retsu;
}


//result配列を多重配列で作る
$result = [];
for($i=1;$i<=$nm[1];$i++){
    $result[$i]=0;
}


//n回のループ作業を作る
//指定箇所を配列で認識できる状態にする
//指定箇所に現在植えられている作物種に対して＋１する
//指定範囲の作物種をeに置き換える


for($i=1;$i<=$nm[0];$i++){
    $do = explode(" ",trim(fgets(STDIN)));
    for($j=$do[0];$j<=$do[1];$j++){
        for($k=$do[2];$k<=$do[3];$k++){
            $getproduct = $hatake[$j][$k];
            $result[$getproduct] += 1;
            $hatake[$j][$k] = $do[4];
        }
    }
}

unset($result["."]);

//result配列をforeachで返しその後に作物種を返す
foreach($result as $value){
    echo $value,PHP_EOL;
}

foreach($hatake as $array){
    echo implode("",$array),PHP_EOL;
}



?>