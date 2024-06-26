<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>値がDateTimeクラスかどうかを調べる</title>
</head>
<body>
<pre>
<?php
$now = new DateTime();
$isDate = $now instanceof DateTime;
var_dump($isDate);
?>
</pre>
</body>
</html>
