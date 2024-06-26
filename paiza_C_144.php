<?php
    $input_line = fgets(STDIN);
    $win = 0;
    
    
    
    for($i=1; $i<=$input_line;$i++){
        $WINLOSE = fgets(STDIN);
        IF(($WINLOSE == "G C".PHP_EOL)||($WINLOSE == "C P".PHP_EOL)||($WINLOSE == "P G".PHP_EOL)){
            $win += 1;
        }
    }
    
    echo $win;
?>