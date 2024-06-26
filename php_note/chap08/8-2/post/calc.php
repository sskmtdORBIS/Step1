<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>フォーム入力の値で計算する</title>
  <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
  // フォーム入力の値を得る（単価と個数）
  $tanka = $_POST["tanka"];
  $kosu = $_POST["kosu"];
  // 計算する
  $price = $tanka * $kosu;
  // 表示する（３桁位取り）
  $tanka = number_format($tanka);
  $price = number_format($price);
  echo "単価{$tanka}円 × {$kosu}個 は {$price}円です。"
?>
</div>
</body>
</html>
