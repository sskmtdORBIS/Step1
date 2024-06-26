
<?php
$N = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$list = [];
for($i=1;$i<=$N;$i++){
    $list[] = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
}

$count=0;

function checkNumber($no) {
    global $list;
    global $count;
    if(in_array($no,$list)){
        $count += 0;
    } else {
        $count += 1;
    }
}


for ($i=1;$i<= $N;$i++){
    checkNumber($i);
}

echo $count,PHP_EOL;


?>