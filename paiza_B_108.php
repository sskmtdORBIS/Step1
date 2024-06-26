<?php
//ゴンドラ数Nグループ数Mを取得する
$nm = explode(" ",trim(fgets(STDIN)));
//乗車可能数を配列に入れる
for($i=0;$i<$nm[0];$i++){
    $capacity[] = trim(fgets(STDIN));
}

//グループの人数を配列に入れる
for($i=0;$i<$nm[1];$i++){
    $group[] = trim(fgets(STDIN));
}

//搭乗人数カウント配列を作る
for($i=0;$i<$nm[0];$i++){
    $count[] = 0;
}




//ゴンドラを回しながら搭乗人数を足していく
$nowgondra = 0;




foreach ($group as $n){
    while($n>0){
        $count[$nowgondra] += min([$capacity[$nowgondra],$n]);
        $n = $n - $capacity[$nowgondra];
        $nowgondra = ($nowgondra+1)%$nm[0];
    }
}

echo implode("\n",$count);

?>