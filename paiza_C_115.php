<?php
$ONE = fgets(STDIN);
trim(preg_match( "/\d+\s/",$ONE,$N));
trim(preg_match( "/\s\d+/",$ONE,$M));
$N = trim($N[0]);
$M = trim($M[0]);

$JAM = 0;

for($i=1;$i<=$N-1;$i++){
    $shakan = fgets(STDIN);
    if($shakan<=$M){
        $JAM += $shakan;
    }
}

echo $JAM;


?>