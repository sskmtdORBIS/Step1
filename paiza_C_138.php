<?php
//人数を取得する
$N = trim(fgets(STDIN));

//記録を配列に入れる
$records = [];
for($i=1;$i<=$N;$i++){
    $records[]=trim(fgets(STDIN));
}


//for

$result = [];

for($i = 0;$i < $N;$i++){
    $result[$i] = 1;
    foreach($records as $value){
        if($records[$i]<$value){
            $result[$i] += 1;
        } else {
            $result[$i] += 0;
        }
    }
}

foreach($result as $value){
    echo $value,PHP_EOL;
}


?>