<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>結果をint型で戻す</title>
</head>
<body>
<pre>
  <?php
  // 計算結果を整数で返す
  function twice(float $var):int {
    $var *= 2;
    return $var;
  }
  // 実行する
  $num = 10.8;
  $result = twice($num);
  echo "{$num}の2倍は", $result;
  ?>
</pre>
</body>
</html>
