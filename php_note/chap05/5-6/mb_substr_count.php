<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字列が含まれている個数を調べる</title>
</head>
<body>
<pre>
<?php
function check($target){
  $result = mb_substr_count($target, "不可");
  if($result >= 3){
    echo "不可が{$result}個あるので、再試験です。" . PHP_EOL;
  } else {
    echo "合格です。" . PHP_EOL;
  }
}
// 試す
check("優,不可,良,可,優,可");
check("可,優,不可,不可,良,不可");
check("不可,可,不可,不可,良,不可");
check("可,良,良,不可,良,不可");
?>
</pre>
</body>
</html>
