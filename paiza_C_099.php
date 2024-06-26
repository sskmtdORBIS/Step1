<?php

$info = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$info = explode(" ",$info);

$width = $info[0] * $info[1];

for($i = 1;$i<= $info[0]-1 ; $i++){
    $join = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
    $width -= $join;
}

echo $info[1] * $width;


?>