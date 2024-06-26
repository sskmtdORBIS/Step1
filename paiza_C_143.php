<?php
$str = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
$pattern = "/-(-*)/";

echo preg_replace($pattern,"-",$str);

?>