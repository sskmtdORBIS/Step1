<?php

$result1 = preg_match("/46-49/u","確か49-46でした");
$result2 = preg_match("/46-49/u","確か46-49でした");

var_dump ($result1);
echo "{$result2}<br><br><br>";

?>  


<?php

$filepath = "/goods/image/cat/";

var_dump(preg_match("/\/image\//u",$filepath));
var_dump(preg_match("#/image/#u",$filepath));

?>