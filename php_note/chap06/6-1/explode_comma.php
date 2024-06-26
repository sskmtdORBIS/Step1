<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>カンマで区切った名前リストから配列を作る</title>
</head>
<body>
<pre>
<?php
$data = "赤井一郎,伊藤　淳,上野信二";
$delimiter = ",";
$nameList = explode($delimiter, $data);
print_r($nameList);
?>
</pre>
</body>
</html>
