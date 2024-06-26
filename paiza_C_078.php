<?php


//日数Nと下限D、上限Uを取得する

$NDU = explode(" ",trim(fgets(STDIN)));

//日毎の株価を配列に入れる

$costs = [];
for($i=0;$i<$NDU[0];$i++){
    $costs[]=trim(fgets(STDIN));
}


$PL=0;
$stocks=0;

for($i=0;$i<$NDU[0]-1;$i++){
    if($costs[$i]<=$NDU[1]){
        $PL -= $costs[$i];
        $stocks++;
    } else if ($costs[$i]>=$NDU[2]){
        $PL += $costs[$i]*$stocks;
        $stocks = 0;
    }
}

$PL += array_pop($costs) * $stocks;
echo $PL;


?>