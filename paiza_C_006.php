<?php
$info = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$info = explode(" ",$info);
$itemN = $info[0];
$userM = $info[1];
$topK = $info[2];

$score = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$score = explode(" ",$score);
$score_array = [];

for ($i = 1;$i <= $userM; $i++){
    $useramount = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
    $useramount = explode(" ",$useramount);
    $userscore = 0;
    for($j = 0;$j< $itemN; $j++){
        $userscore += $score[$j] * $useramount[$j];
    }
    $score_array[] = round($userscore);
}
rsort($score_array);
$top = array_slice($score_array,0,$topK);

foreach($top as $value){
    echo $value,PHP_EOL;
}


?>