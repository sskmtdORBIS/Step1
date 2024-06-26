<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>複数の型を指定する</title>
</head>
<body>
<pre>
  <?php
  // stringとfloat型の引数を受け取る
  function twice(string|float $var):float {
    $var *= 2;
    return $var;
  }
  // 実行する
  $num1 = "1.9cm";
  $num2 = 2.6;
  $result1 = twice($num1);
  $result2 = twice($num2);
  echo "{$num1}の2倍は", $result1 , PHP_EOL;
  echo "{$num2}の2倍は", $result2;
  ?>
</pre>
</body>
</html>
