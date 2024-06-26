<?php

//マスNと抽選回数Kを取り出す
$nk = explode(" ",trim(fgets(STDIN)));

//ビンゴカードの多重配列を作る
$card = [];
$retsu = [];
for($i=1;$i<=$nk[0];$i++){
    $retsu = explode(" ",trim(fgets(STDIN)));
    $card[$i-1] = $retsu;
}


//ビンゴの抽選を順番に呼び出し、ビンゴカード配列の中に合致したらビンゴカードのますを"0"に変える

$draw = explode(" ",trim(fgets(STDIN)));

foreach($draw as $key => $value){
    for($i=0;$i<$nk[0];$i++){
        for($j=0;$j<$nk[0];$j++){
            if($card[$i][$j]==$value){
                $card[$i][$j] = 0;
            }
        }
    }
}

//横のビンゴを探す
//配列の行の合計が0だったら正解＋１
$result = 0;

foreach($card as $array){
    if(array_sum($array) == 0){
        $result += 1;
    }
}


//縦のビンゴを探す
//keyが$iの値を合計しーNだったら正解＋１
$vertical = 0;
for($i=0;$i<$nk[0];$i++){
    foreach($card as $array){
        $vertical += $array[$i];
    }
    if($vertical == 0){
        $result += 1;
    }
}


//斜めのビンゴを探す
//各行の１、２、３、・・・N番めの合計、N、N-1,・・・、１番めの合計がーNだったらそれぞれ正解＋１

$diagonal = 0;
for($i=0;$i<$nk[0];$i++){
    $diagonal += $card[$i][$i];
}
if($diagonal==0){
    $result += 1;
}


$diagonal = 0;
for($i=0;$i<$nk[0];$i++){
    $retsu = $nk[0]-$i-1;
    $diagonal += $card[$i][$retsu];
}

if($diagonal==0){
    $result += 1;
}

echo $result;

?>