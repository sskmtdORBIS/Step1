<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>連想配列から値を取り出す</title>
</head>
<body>
<pre>
<?php
// 連想配列を作る
$goods = [
  'id' => 'R56',
  'size' => 'M',
  'price' => 2340
];
// priceキーの値を変更する
$goods['price'] = 3500;
// 表示する
echo "id：" . $goods['id'] . PHP_EOL;
echo "サイズ：" . $goods['size'] . PHP_EOL;
echo "価格：" . number_format($goods['price']) . "円" . PHP_EOL;
?>
</pre>
</body>
</html>
