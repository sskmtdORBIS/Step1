<?php

$list = array(20,32,50,5,40);
$count = count($list);
$sum = 0;
for ($i=0; $i<$count;$i++){
    $value = $list[$i];
    if($value<0){
        continue;
    } else {$sum += $value;
        $a = "正常に処理が終了しました。合計は{$sum}です。";
    }
}
echo "合計:$a";
?>