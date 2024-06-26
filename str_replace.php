<?php
$data = ["NV15","MD500GB","ST"];
$search = ["NV","ST","MD"];
$replacement = ["New Version","マルチドライブ","SlimTower"];
$result = str_replace ($search,$replacement,$data);

print_r($result);

?>