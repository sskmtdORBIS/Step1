<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>論理積、論理和、否定の演算</title>
</head>
<body>
<pre>
<?php
$test1 = TRUE;
$test2 = FALSE;
$hantei1 = $test1 && $test2;
$hantei2 = $test1 || $test2;
$hantei3 = !$test1;
var_dump($hantei1);
var_dump($hantei2);
var_dump($hantei3);
?>
</pre>
</body>
</html>
