<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>複数の置換を値番号で指定する</title>
</head>
<body>
<?php
$format = '%1$fと%2$fは、それぞれ%1$.2fと%2$.2fになります。';
$a = 12.5673;
$b = 23.6256;
printf($format, $a, $b);
?>
</body>
</html>
