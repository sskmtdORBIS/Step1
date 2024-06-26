<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>引数をint型として受け取る</title>
</head>
<body>
<pre>
  <?php
  // 引数は整数
  function twice(int $var) {
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
