<?php
$info = trim(fgets(STDIN));
$info = str_replace(array("\n","\r","\r\n"),'',$info);
$info = explode(" ",$info);
$N = $info[0];
$R = $info[1];

$SHOKI = [];
for($i=1;$i<=$N;$i++){
    $SHOKI["$i"] = 1;
}

for($i = 1 ; $i <= $R; $i++){
$game = trim(fgets(STDIN));
$game = str_replace(array("\n","\r","\r\n"),'',$game);
$game = explode(" ",$game);
$win = $game[0];
$lose = $game[1];

$SHOKI[$win] += $SHOKI[$lose];
}

$max = max($SHOKI);

function hantei($value) {
    global $max;
    return $value == $max;
}

$winner = array_filter($SHOKI,"hantei");
asort($winner);

foreach($winner as $key => $value){
    echo $key,PHP_EOL;
}

?>