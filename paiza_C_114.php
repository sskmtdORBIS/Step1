<?php
    $input_line = fgets(STDIN);
    $array =[];
    for($i = 1 ; $i <= $input_line; $i++){
        $word = fgets(STDIN);
        $word = str_replace(array("\n","\r","\r\n"),"",$word);
        $array[] = $word;
        }
    
    for($j = 0; $j <= $input_line-2; $j++){
        $shiri = mb_substr($array[$j],-1,1);
        $atama = mb_substr($array[$j +1],0,1);
        $henji = "";
        if($shiri == $atama){
            $henji = "Yes";
        } else {
            $henji = $shiri." ".$atama;
            break;
        }
    }
    echo $henji;
?>