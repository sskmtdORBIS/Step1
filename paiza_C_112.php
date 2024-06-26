<?php
$movecount = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));

$spent_array = [];

for($i = 1;$i <= $movecount;$i++){
    $dailydata = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
    $dailydata = explode(" ",$dailydata);
    $spenttime = $dailydata[0] + $dailydata[1] + (24-$dailydata[2]);
    $spent_array[]=$spenttime;
}


echo min($spent_array),PHP_EOL;
echo max($spent_array);

?>