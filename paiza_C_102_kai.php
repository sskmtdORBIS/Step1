<?php

$countA = trim(fgets(STDIN));
$infoA = [];
for($i=1;$i<=$countA;$i++){
    $infoA[] = trim(fgets(STDIN));
}

$countB =  trim(fgets(STDIN));
$infoB = [];
for($i=1;$i<=$countB;$i++){
    $infoB[] =  trim(fgets(STDIN));
}

$next = "A";

for($i=1;$i<=31;$i++){
    if(in_array($i,$infoA)&&in_array($i,$infoB)) {
        if($next == "A"){
            echo "A",PHP_EOL;
            $next = "B";
        } else {
            echo "B",PHP_EOL;
            $next = "A";
        }
    } else if(in_array($i,$infoA)) {
            echo "A",PHP_EOL;
        } else if(in_array($i,$infoB)){
                echo "B",PHP_EOL;
            } else { 
                echo "x",PHP_EOL;
            }
        }

?>