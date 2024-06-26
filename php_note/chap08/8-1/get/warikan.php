<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>GETリクエスト処理</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
  // GETリクエストのパラメータの値を受け取る
  $goukei = $_GET["goukei"];
  $ninzu = $_GET["ninzu"];
  // 計算する
  $amari = $goukei % $ninzu;
  $price = ($goukei - $amari) / $ninzu;
  // 表示する
  echo "{$goukei}円を{$ninzu}人で割り勘します。", "<br>";
  echo "１人{$price}円を支払うとすると、不足分は{$amari}円です。"
?>
</div>
</body>
</html>
