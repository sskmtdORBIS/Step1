<?php
// 国数を求める
$N = trim(fgets(STDIN));

//各国の標準時との差分を配列にする　key 国名　value 時差
$difference = [];
for($i=1;$i<=$N;$i++){
    $regioninfo = explode(" ",trim(fgets(STDIN)));
    $difference["$regioninfo[0]"] = $regioninfo[1];
}


//今回の与えられた国と時刻を取得して標準時を求める
$NOW = explode(" ",trim(fgets(STDIN)));
$STANDARDTIME = mb_substr($NOW[1],0,2) - $difference[$NOW[0]];
if($STANDARDTIME>=24){
    $STANDARDTIME -= 24;
} else if($STANDARDTIME<0){
    $STANDARDTIME = 24 + $STANDARDTIME;
}
$minute = mb_substr($NOW[1],-2);

//時差を踏まえて各国の時刻を算出する

function caltime(&$value,$key){
    global $STANDARDTIME;
    global $minute;
    $value = $STANDARDTIME + $value;
    if($value>=24){
        $value -= 24;
    } else if ($value<0){
        $value = 24 + $value;
    }
    $value = sprintf('%02d:%02d',$value,$minute);
}


array_walk($difference,"caltime");

foreach ($difference as $value){
    echo $value,PHP_EOL;
}


?>