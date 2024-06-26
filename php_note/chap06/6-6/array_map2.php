<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>複数の配列を並列的に処理する</title>
</head>
<body>

<?php
// ２つの配列の値をリストアップする
function listUp($value1, $value2){
  // <li>タグを付けてリスト形式で表示する
  echo "<li>", $value1, " -- ", $value2, "</li>", PHP_EOL;
}

// 通過地点
$point = ["10km", "20km", "30km", "40km", "Goal"];
// スプリット
$split = ["00:50:37", "01:39:15", "02:28:25", "03:21:37", "03:34:44"];
echo "<ul>", PHP_EOL;
array_map("listUp", $point, $split);
echo "</ul>";
?>

</body>
</html>
