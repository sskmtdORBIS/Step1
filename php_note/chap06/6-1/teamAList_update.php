<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>名前のリスト</title>
</head>
<body>
<pre>
<?php
$teamA = ["赤井一郎", "伊藤五郎", "上野信二"];
// インデックス番号1の値を変更する
$teamA[1] = "石丸四郎";
echo $teamA[0] . "さん" . PHP_EOL;
echo $teamA[1] . "さん" . PHP_EOL;
echo $teamA[2] . "さん" . PHP_EOL;
?>
</pre>
</body>
</html>
