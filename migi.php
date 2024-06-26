<?php
function makeyogurt($flavour,$container = "bowl")
{
    return "Making a $container of $flavour yogurt.\n";
}
 
echo makeyogurt("raspberry","cup"); // $container に "raspberry" を指定します。$flavour ではありません。
?>