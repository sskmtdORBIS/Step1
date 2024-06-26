<?php
function compareStr($a,$b){
    $result = strcmp($a,$b);
    if($result < 0){
        echo "$result","<br>{$a}、{$b}の順。<br>";
    } else if ($result == 0){
        echo "$result","<br>{$a}と{$b}は同じ。<br>";
    } else if ($result > 0){
        echo "$result","<br>{$b}、{$a}の順。<br>";
    }
}

compareStr(1, 8);
compareStr("a", "C");
compareStr("009",99);
?>