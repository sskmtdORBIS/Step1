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
for($i=0; $i<count($teamA); $i++){
  echo $teamA[$i], "さん", PHP_EOL;
}
?>
</pre>
</body>
</html>
