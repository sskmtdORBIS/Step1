<?php
    $N = trim(fgets(STDIN));
    $floor = 1;
    $movetotal = 0;
    for($i = 0; $i < $N ; $i++){
        $nextfloor = trim(fgets(STDIN));
        if($floor <= $nextfloor){
            $move = $nextfloor - $floor;
        } else {
            $move = $floor - $nextfloor;
        }
        $floor = $nextfloor;
        $movetotal += $move;
    }
    
    echo $movetotal,PHP_EOL;
?>