<?php
function compareStr($a,$b){
    $result = strcasecmp($a,$b);
    if($result < 0){
        echo "$result","<br>{$a}、{$b}の順。<br>";
    } else if ($result == 0){
        echo "$result","<br>{$a}と{$b}は同じ。<br>";
    } else if ($result > 0){
        echo "$result","<br>{$b}、{$a}の順。<br>";
    }
}

compareStr("a", "C");
compareStr("a", "A");
compareStr("009",99);
?>