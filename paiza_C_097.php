<?php
$array = explode(" ",fgets(STDIN));
for($i = 1 ; $i <= $array[0] ; $i++){
    if($i % $array[1] == 0){
        if($i % $array[2] == 0){
        echo "AB";
        } else {
            echo "A";
        }
    } else if($i % $array[2] == 0){
        echo "B";
    } else {
        echo "N";
    }
    echo PHP_EOL;
}

?>