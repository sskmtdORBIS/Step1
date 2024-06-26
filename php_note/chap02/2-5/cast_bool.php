<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>値が入っているかどうかを調べる</title>
</head>
<body>
<?php
$theDate = null;
$theDate = new DateTime();
$isAccess = (bool)$theDate;
var_dump($isAccess);
?>
</body>
</html>
