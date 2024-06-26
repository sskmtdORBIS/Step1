<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>距離と角度から高さを求める</title>
</head>
<body>
<?php
$kyori = 20;
$kakudo = 32 * pi()/180;  // 度数をラジアンに変換
$takasa = $kyori * tan($kakudo);
$takasa = round($takasa*10)/10;

echo "木の高さは{$takasa}mです。"
?>
</body>
</html>
