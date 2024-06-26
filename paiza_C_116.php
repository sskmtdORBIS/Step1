<?php

$info = explode(" ",trim(fgets(STDIN)));
$production = explode(" ",trim(fgets(STDIN)));

for($i=0;$i<=$info[0]-$info[1];$i++){
    $exam = array_slice($production,$i,$info[1]);
    $count = 0;
    foreach($exam as $value){
        $count += $value;
    }
    if($count == 0){
        $result = "NG";
        break;
    } else {
        $result = "OK";
    }
}

echo $result,PHP_EOL

?>