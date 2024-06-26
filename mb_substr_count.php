<?php
function check($target){
    $result = mb_substr_count($target,"不可");
    if($result >= 3){
        echo "不可が{$result}個あるので、再試験です。<br>";
    } else {
        echo "合格！！<br>";
    }
}

check ("不可,不可,不 可,");
?>
