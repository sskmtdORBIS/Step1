<?php

$info = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$info = explode(" ",$info);

$PL = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$PL = explode(" ",$PL);

$close = 0;

for($i = 1; $i <= $info[0];$i++){
    $sell = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
    $shopProfit = $sell * $PL[2] - $PL[0] - $PL[1] * $info[1];
    if($shopProfit < 0){
        $close += 1;
    }
}

echo $close;


?>