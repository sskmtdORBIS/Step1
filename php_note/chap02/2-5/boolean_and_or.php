<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>and、or論理演算子を使ったコード</title>
</head>
<body>
<pre>
<?php
$test1 = TRUE;
$test2 = FALSE;
$hantei1 = ($test1 and $test2);
$hantei2 = ($test1 or $test2);
var_dump($hantei1);
var_dump($hantei2);
?>
</pre>
</body>
</html>
