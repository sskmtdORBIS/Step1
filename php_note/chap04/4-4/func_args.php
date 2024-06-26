<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>引数の個数を固定しない関数</title>
</head>
<body>
<pre>
<?php
function myFunc(){
  // すべての引数
  $allArgs = func_get_args();
  // 引数の値の合計
  $total = array_sum($allArgs);
  // 引数の個数
  $numArgs = func_num_args();
  if ($numArgs>0){
    $average = $total/$numArgs;
    // 最後の値を取り出す
    $lastValue = func_get_arg($numArgs-1);
  } else {
    $lastValue = $average = $total = "（データ無し）";
  }
  echo "合計点", $total, PHP_EOL;
  echo "平均点", $average, PHP_EOL;
  echo "最後の点数", $lastValue, PHP_EOL;
}

// 実行する
myFunc(43, 67, 55, 75);
?>
</pre>
</body>
</html>
