<?php
$input = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$input = explode (" ",$input );
echo $input[0] * ((100-$input[1]) / 100) * ((100-$input[2])/100);

?>