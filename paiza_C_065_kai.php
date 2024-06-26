<?php
//ヒント行数を取得
$N = trim(fgets(STDIN));

//ヒントを取得する
//maxとminと除算数に振り分ける
$denominator = [];
$min = 0;
$max = 100;
for($i=1;$i<=$N;$i++){
    $hint = explode(" ",trim(fgets(STDIN)));
    if($hint[0] == "/"){
        $denominator[] = $hint[1];
    } else if($hint[0] == ">") {
        $min = max([$min,$hint[1]]);
    } else if($hint[0] == "<") {
        $max = min([$max,$hint[1]]);
    }
}

//割る数が条件に存在しないパターンの場合は最小値の一つ上の数に固定されないといけないのでmin+1を返す
$result = $min + 1;

//$iを割る数で順番に割っていき、割り切れなかった時点で$iは候補から外れるのでfalseを返してブレイク
//foreachがブレイクされずに通ってフラグが変わっていなければそれが答えなので$iを返すå

for($i=$min+1;$i<$max;$i++){
    $resultok = true;
    foreach($denominator as $value){
        if($i%$value != 0){
            $resultok = false;
            break;
        } 
    }
    if($resultok == true){
        $result = $i;
        break;
    }
}
echo $result,PHP_EOL;
?>