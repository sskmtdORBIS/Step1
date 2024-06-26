<?php

$countA = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$infoA = [];
for($i=1;$i<=$countA;$i++){
    $infoA[] =  str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
}

$countB = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$infoB = [];
for($i=1;$i<=$countB;$i++){
    $infoB[] =  str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
}

$result = [];
$next = "A";

for($i=1;$i<=31;$i++){
    if(in_array($i,$infoA)&&in_array($i,$infoB)) {
        if($next == "A"){
            $result[] = "A";
            $next = "B";
        } else {
            $result[] = "B";
            $next = "A";
        }} else {
if(in_array($i,$infoA)){
    $result[] = "A";
} else {
    if(in_array($i,$infoB)){
        $result[] = "B";
    } else {
        $result[] = "x";
    }
}
        }
}


foreach ($result as $value) {
    echo $value,PHP_EOL;
}









?>