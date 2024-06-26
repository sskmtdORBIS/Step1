<?php
$N = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$list = [];
for($i=1;$i<=$N;$i++){
    $list[] = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
}
$count = 0;
for($i=1;$i<=$N;$i++){
    if(in_array($i,$list)){
        $count += 0;
    } else {
        $count += 1;
    }
}

echo $count,PHP_EOL;

?>