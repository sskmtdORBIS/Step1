<?php
$N = trim(fgets(STDIN));
$shokiball = [];
for($i = 1; $i <= $N; $i++){
    $shokiball[] = trim(fgets(STDIN));
}

$PLAYTIMES = trim(fgets(STDIN));

for($j = 1; $j <= $PLAYTIMES; $j++){
    $play = trim(fgets(STDIN));
    $play = str_replace(array("\n","\r","\r\n"),'',$play);
    $play = explode(" ",$play);
    $who = $shokiball[$play[0]-1];
    $whom = $shokiball[$play[1]-1];
    $amount = $play[2];
    if($who < $amount){
        $pass = $who;
    } else {
        $pass = $amount;
    }
    $who -= $pass;
    $shokiball[$play[0]-1] = $who;
    $whom += $pass;
    $shokiball[$play[1]-1] = $whom;
}

for($p = 0; $p <= $N-1; $p++){
    echo $shokiball[$p],PHP_EOL;
}


?>