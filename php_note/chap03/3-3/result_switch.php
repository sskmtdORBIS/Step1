<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>switch文で代入</title>
</head>
<body>
<?php
$level = 2;
switch ($level){
  case 1:
    $result = "初心者";
    break;
  case 2:
    $result = "中級者";
    break;
  default:
    $result = "該当無し";
    break;
}
echo "判定　{$result}";
?>
</body>
</html>
