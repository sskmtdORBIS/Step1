<?php
function takes_array($input)
{
    echo "$input[0] + $input[1] = ", $input[0]+$input[1];
}

$hairetsu = [2,3,4,5];
takes_array($hairetsu);
?>