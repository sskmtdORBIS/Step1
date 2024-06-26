<?php

$NR = explode(" ",trim(fgets(STDIN)));

function putin ($hwd){
    global $NR;
    if(min($hwd)>=$NR[1]*2){
        return true;
    }
}

for($i=1;$i<=$NR[0];$i++){
    $data = explode(" ",trim(fgets(STDIN)));
    if(putin($data)){
        echo $i,PHP_EOL;
    }
}

?>