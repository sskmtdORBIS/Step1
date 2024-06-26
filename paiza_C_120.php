<?php

//花の数を取得する
$hana = trim(fgets(STDIN));

//一つめの花列情報を取得する
$first = trim(fgets(STDIN));

//二つめの花列情報を取得しN回回して一つめと同じになったらYesでブレイク、抜けたらNo
$second = trim(fgets(STDIN));


for($i=0;$i<$hana;$i++){
    $secondmove = mb_substr($second,$i+1).mb_substr($second,0,$i+1);
    if($first == $secondmove){
        $result = "Yes";
        break;
    } else {
        $result = "No";
    }
}

echo $result,PHP_EOL;

?>