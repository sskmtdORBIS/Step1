<?php
function check($str2){
    $str1 = "ABC";

    $result = strncmp($str1,$str2,strlen($str1));
    echo "{$result}<br>";
    echo "{$str2}は";
    if($result == 0){
        echo "{$str1}から始まっています。<br>";
    } else {
        echo "ダメです。<br>";
    }
}

check("ABC123");
check("cba234");
check("abcabc");
check("ABcdef");
?>  