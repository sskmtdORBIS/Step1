<?php
$subject = str_replace(array("\r","\n","\r\n"),'',trim(fgets(STDIN)));
echo str_replace(array("A","E","G","I","O","S","Z"),array("4","3","6","1","0","5","2"),$subject);
?>