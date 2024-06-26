<?php
//人数Nと曲の長さMを取得する
$NM = explode(" ",trim(fgets(STDIN)));

//曲の正しい音程を配列に入れる
$music = [];
for($i=0;$i<$NM[1];$i++){
    $music[] = trim(fgets(STDIN));
}

//減点関数を作る
//・誤差 5 Hz 以内なら減点しない
//・上記に当てはまらず、誤差 10 Hz 以内なら 1 点減点
//・上記に当てはまらず、誤差 20 Hz 以内なら 2 点減点
//・上記に当てはまらず、誤差 30 Hz 以内なら 3 点減点
//・上記に当てはまらない場合、5 点減点

function deduction ($record,$correct){
    global $point;
    $gap = abs($record - $correct);
    if($gap>=0 && $gap<=5){
        $point -= 0;
    } else if($gap>5 && $gap<=10) {
        $point -= 1;
    } else if($gap>10 && $gap<=20) {
        $point -= 2;
    } else if($gap>20 && $gap<=30) {
        $point -= 3;             
    } else {
        $point -= 5;
    }
    return $point;
}



//j番目の人の得点を出すために音程の差分で減点していきながら０になったらそれ以上減点せずbreak
//N人分の得点配列を作りマックスを返す

for($j=0;$j<$NM[0];$j++){
    $point = 100;
    for($i=0;$i<$NM[1];$i++){
        deduction(trim(fgets(STDIN)),$music[$i]);
        if($point<=0){
            $point = 0;
            break;
        }
    }
$pointlist[] = $point; 
}

echo max($pointlist);
?>