<?php
$namelist = ["赤井","伊藤","藤田","上野"];
echo "<ol>",PHP_EOL;

foreach($namelist as $value){
    echo "<li>",$value,"さん</li>",PHP_EOL;

}
echo "</ol>",PHP_EOL;
?>