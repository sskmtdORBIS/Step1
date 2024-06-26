<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列から文字列を作る</title>
</head>
<body>
<pre>
<?php
$data = ["赤井一郎", "伊藤　淳", "上野信二"];
$glue = "さん、";
$nameList = implode($glue, $data);
$nameList .= "さん";
print_r($nameList);
?>
</pre>
</body>
</html>
