<?php
function check($target,$str){
    $result = mb_strpos($target, $str);
    if($result === false){
        echo "「{$str}」は「{$target}」には含まれていません。<br>";
    } else {
        echo "「{$str}」は「{$target}」の",$result + 1, "文字目にあります。<br>";
    }
}

check("東京都渋谷区神南","渋谷");
check("東京都渋谷区神南","新宿");


?>  