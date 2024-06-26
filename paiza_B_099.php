<?php
//地図サイズNと通行できない降水量Mを取得する
$NM = explode(" ",trim(fgets(STDIN)));

//多次元配列でエリアごとの降水量を配列として保持する
$map=[];
$row=[];

for($i=0;$i<$NM[0];$i++){
    $row = explode(" ",trim(fgets(STDIN)));
    $map[] = $row;
}

//列を探索しにいき、通行できないマスがあった時点でbreak、通行できたら列番号を配列に入れる

$result = [];

for($i=0;$i<$NM[0];$i++){
    $OK = true;
    for($j=0;$j<$NM[0];$j++){
        if($map[$j][$i]>=$NM[1]){
            $OK = false;
            break;
        }
    }
    if($OK == true){
        $result[] = $i+1;
    }
}

//配列の中身が０個ならwait　１個以上なら配列を" "でimplodeして回答する
if(count($result)==0){
    echo "wait",PHP_EOL;
} else {
    echo implode(" ",$result);
}


?>