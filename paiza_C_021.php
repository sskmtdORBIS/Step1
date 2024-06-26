<?php

//台風の中心座標x、yと台風の目の半径r１台風の外側の半径r２を取得する

$xyr1r2=explode(" ",trim(fgets(STDIN)));


//判定関数
function judge ($x,$y){
    global $xyr1r2;
    $judgement = ($x-$xyr1r2[0])**2 + ($y-$xyr1r2[1])**2;
    if($judgement >= $xyr1r2[2]**2 && $judgement <= $xyr1r2[3]**2){
        echo "yes",PHP_EOL;
    } else {
        echo "no",PHP_EOL;
    }
}

//人数を取得
$n = trim(fgets(STDIN));

//判定の実行
for($i=0;$i<$n;$i++){
    $location = explode(" ",trim(fgets(STDIN)));
    judge($location[0],$location[1]);
}


?>