<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>変数を利用した計算</title>
</head>
<body>
<?php
// 3教科の得点
$kokugo = 67;
$sansu = 72;
$rika = 85;
// 合計点
$goukei = $kokugo + $sansu + $rika;
// 平均点
$heikin = $goukei/3;
// 表示
echo "合計：", $goukei, "<br>";
echo "平均点：", $heikin
 ?>
</body>
</html>
