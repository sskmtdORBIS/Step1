<?php

$info = trim(fgets(STDIN));
$info = str_replace(array("\r","\n","\r\n"),'',$info);
$info = explode(" ",$info);
$rosen = $info[0];
$eki = $info[1];

$zentairosenkakaku =[];

for($i = 1; $i <= $rosen; $i++){
    $rosenkakaku = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
    $rosenkakaku = explode(" ",$rosenkakaku);
    $zentairosenkakaku[] = $rosenkakaku;
    }

$movecount = trim(fgets(STDIN));
$now = 1;
$charge = 0;


for($i = 1; $i <= $movecount; $i++){
    $move = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
    $move = explode(" ",$move);
    if($now != $move[1]){
    $rosenshitei = $zentairosenkakaku[$move[0]-1];
    $movecharge = abs($rosenshitei[$move[1]-1] - $rosenshitei[$now-1]);
    $charge += $movecharge;
    $now = $move[1];
    } 
}

echo $charge;

?>