<?php
//小節数を取得する
$N = trim(fgets(STDIN));


//小節のデータをLとRごとに配列の形に格納する関数


function arrayLR ($bar){
    global $L;
    global $R;
    for($i=1;$i<=$bar[0];$i++){
        if(mb_substr($bar[$i],0,1)=="L"){
            $L[] = $bar[$i];
        } else {
            $R[] = $bar[$i];
        }
    }
    return $L;
    return $R;
}


//errorを検出する関数
function errorcheck ($array){
    $check = [];
    $errorcount = 0;
    $number = [];
    foreach($array as $value){
        if(in_array(mb_substr($valur,1,1),$check)){
            $errorcount += 1;
            break;
        }
    }
    foreach($array as $value){
        $number [] = mb_substr($value,3,1);
    }
    if(max($number)==6 && min($number)==1){
        $errorcount += 1;
    }
    return $errorcount;
}




//LとRのそれぞれにダメなパターンの数を出す
//数字部分に1と6を含む

//2文字目にaとbが存在する


    
//N行の判定を行う
for($i=0;$i<$N;$i++){
    $L = [];
    $R = [];
    $bargets = explode(" ",trim(fgets(STDIN)));
    arrayLR($bargets);
    echo errorcheck($L);
    echo PHP_EOL;
    echo errorcheck($R);
}






?>