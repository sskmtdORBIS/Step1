<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>複製した配列をソートする</title>
</head>
<body>
<pre>
<?php
$data = [23, 16, 8, 42, 15, 4];
// 配列を複製する
$clone = $data;
// 昇順にソートする
sort($clone);
// 確認する
echo "元：";
print_r($data);
echo "複製：";
print_r($clone);
?>
</pre>
</body>
</html>
