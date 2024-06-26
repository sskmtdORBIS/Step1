<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>値を左寄せにするか右寄せにするか</title>
</head>
<body>
<?php
$a = "23ab";
printf("IDは%'#-8sです。", $a);
printf("IDは%'*+8sです。", $a);
?>
</body>
</html>
