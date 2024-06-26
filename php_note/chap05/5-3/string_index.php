<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>１文字ずつ順に取り出す</title>
</head>
<body>
<pre>
<?php
$id = "Peace"; // 半角英数文字
$length = strlen($id);
for ($i=0; $i<$length; $i++){
  $chr = $id[$i];
  echo "{$i}-", $chr, PHP_EOL;
}
?>
</pre>
</body>
</html>
