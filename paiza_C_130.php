<?php
$count = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));

$retry = 0;
$retrynumber = [];

for($i =1;$i<=$count;$i++){
    $result1_2 = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
    $result1_2 = explode(" ",$result1_2);
    if($result1_2[1] == "n" || $result1_2[0] == "n" ){
            $retry += 1;
            $retrynumber[] = $i;
        }
}
echo $retry,PHP_EOL;
foreach ($retrynumber as $value){
    echo $value,PHP_EOL;
}

?>