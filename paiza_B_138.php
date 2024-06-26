<?php

$info = trim(fgets(STDIN));
$info = str_replace(array("\r","\n","\r\n"),'',$info);
$info = explode(" ",$info);
$row = $info[0];
$col = $info[1];
$map = [];


for($i = 1 ; $i <= $row ; $i++){
    $data = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
    $data = str_replace("#",1,$data);
    $data = str_replace(".",0,$data);
    $map[] = $data;
}

$answer = 0;

for($i = 1; $i<= $row - 2;$i++){
    for($j = 1; $j <= $col - 2;$j++){
    $now = mb_substr($map[$i],$j,1);
        if( $now == 0){
            $hantei = mb_substr($map[$i-1],$j-1,3) + mb_substr($map[$i],$j-1,1) + mb_substr($map[$i],$j+1,1) + mb_substr($map[$i+1],$j-1,3);
            if($hantei == 224){
                $answer += 1;
            }
        }
}
}
echo $answer;





?>





