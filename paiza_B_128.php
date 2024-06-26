<?php
$numbers = trim(fgets(STDIN));

function getCode($number){
    $code =[];
    if($number==0){
        $code = [[".",".","."],[".",".","."],[".",".","."]];
    } else if($number==1){
        $code = [["#",".","."],[".",".","."],[".",".","."]];
    } else if($number==2){
        $code = [["#","#","."],[".",".","."],[".",".","."]];
    } else if($number==3){
        $code = [["#","#","#"],[".",".","."],[".",".","."]];
    } else if($number==4){
        $code = [["#","#","#"],["#",".","."],[".",".","."]];
    } else if($number==5){
        $code = [["#","#","#"],["#","#","."],[".",".","."]];
    } else if($number==6){
        $code = [["#","#","#"],["#","#","#"],[".",".","."]];
    } else if($number==7){
        $code = [["#","#","#"],["#","#","#"],["#",".","."]];
    } else if($number==8){
        $code = [["#","#","#"],["#","#","#"],["#","#","."]];
    } else if($number==9){
        $code = [["#","#","#"],["#","#","#"],["#","#","#"]];
    }
    return $code;
}


$length = strlen($numbers);
$row = $length/3;


$code =[];
for($i=0;$i<$row;$i++){
    $threeDigit=mb_substr($numbers,$i*3,3);
    $first = getCode($threeDigit[0]);
    $second = getCode($threeDigit[1]);
    $third = getCode($threeDigit[2]);
    $code[] = array_merge($first[0],$second[0],$third[0]);
    $code[] = array_merge($first[1],$second[1],$third[1]);
    $code[] = array_merge($first[2],$second[2],$third[2]);
}

foreach($code as $row){
    foreach($row as $value){
        echo $value;
    }
    echo PHP_EOL;
}



?>