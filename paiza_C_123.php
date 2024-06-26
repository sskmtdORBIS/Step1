<?php
$N = trim(fgets(STDIN));
$age = [];
for ($i = 1; $i <= $N; $i++){
    $age[] = trim(fgets(STDIN));
}

$M = trim(fgets(STDIN));

$result = [];

for($i = 1;$i<=$M;$i++){
    $mamemaki = explode(" ",trim(fgets(STDIN)));
    for($j=0;$j<=$N-1;$j++){
        if($j>=$mamemaki[0]-1&&$j<=$mamemaki[1]-1){
            $result[$j] += $mamemaki[2];
        } else {
            $result[$j] += 0;
        }
        if($result[$j]>=$age[$j]) {
            $result[$j] = $age[$j];
        }
    }
}

foreach ($result as $value){
    echo $value,PHP_EOL;
}

?>