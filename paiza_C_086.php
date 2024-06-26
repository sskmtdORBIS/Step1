<?php
$subject = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
echo str_ireplace(array("a","i","u","e","o"),'',$subject);

?>