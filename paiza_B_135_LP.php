<?php

$data = "8 Lb_1 Lb_2 Lb_3 Lb_4 Lb_5 Lb_6 Ra_3 Ra_6";

$barTEST = explode(" ",trim($data));

$L = [];
$R = [];

function arrayLR ($bar){
    global $L;
    global $R;
    for($i=1;$i<=$bar[0];$i++){
        if(mb_substr($bar[$i],0,1)=="L"){
            $L[] = $bar[$i];
        } else {
            $R[] = $bar[$i];
        }
    }
    return $L;
    return $R;
}

arrayLR($barTEST);
print_r($L);
echo "<br>";
print_r($R);


?>