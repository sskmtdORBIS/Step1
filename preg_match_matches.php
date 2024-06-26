<?php

$pattern = "/佐.+子/u";

$subject = <<< "names"
佐藤友樹
佐藤ゆう子
塩田智子
佐藤花子
杉山芳
names;

$result = preg_match_all($pattern,$subject,$matches);

if($result === false){
    echo "エラー：", preg_last_error();
} else if($result == 0) {
    echo "マッチした人はいません。";
} else {
    echo "「",implode(",",$matches[0]),"」が見つかりました。";
}
?>