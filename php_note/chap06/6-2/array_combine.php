<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>２つの配列から連想配列を作る</title>
</head>
<body>
<pre>
<?php
// 通過地点
$point = ["10km", "20km", "30km", "40km", "Goal"];
// スプリット
$split = ["00:50:37", "01:39:15", "02:28:25", "03:21:37", "03:34:44"];
// 通過地点をキー、スプリットを値にした連想配列にする
$result = array_combine($point, $split);
print_r($result);
?>
</pre>
</body>
</html>
