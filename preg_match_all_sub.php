<?php

$pattern = "/2013([A-F])-(..)/";
$subject = "2012A-sx,2013F-fx,2013G-fx,2013A-dx,2015a-sx,2013D-12";
$result = preg_match_all($pattern,$subject,$matches);

if($result === false){
    echo "エラー", preg_last_error();
} else if ($result == 0){
    echo "マッチした型はありません。";
} else {
    $all = implode (",",$matches[0]);
    $model = implode (",",$matches[1]);
    $type = implode (",",$matches[2]);
    echo "見つかった形式：{$all}<br>";
    echo "モデル：{$model}<br>";
    echo "タイプ：{$type}";
}

?>