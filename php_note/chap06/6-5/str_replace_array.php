<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列を検索置換して表示する</title>
</head>
<body>
<pre>
<?php
$data= ["NV15", "ST", "MD500GB"];
$search = ["NV", "ST", "MD"];
$replacement = ["New Vision", "スリムタワー","マルチドライブ"];
$result = str_replace($search, $replacement, $data);
echo "商品データ：", PHP_EOL;
echo $result[0], "、", $result[1], "、", $result[2];
?>
</pre>
</body>
</html>
