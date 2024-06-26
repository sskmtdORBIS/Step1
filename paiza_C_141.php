<?php

$N = trim(fgets(STDIN));
$reslt = [];
for($i=1;$i<=$N;$i++){
    $name = trim(fgets(STDIN));
    $result["$name"] += 1;
}

echo array_search(max($result),$result);

?>