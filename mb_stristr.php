<?php
function pickout($target, $str){
    $result = mb_stristr($target, $str);
    if($result === false){
        echo "(not found)<br>";
    } else {
        echo "{$result}<br>";
    }
}

pickout("ああいいううええ","う");
?>