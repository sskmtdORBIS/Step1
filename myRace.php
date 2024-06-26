<?php
require_once("Runner.php");
?>

<?php
$runner1 = new Runner(name:"福士",age:23);
$runner1->who();
print_r($runner1);
?>  