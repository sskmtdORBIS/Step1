<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>スタティック変数</title>
</head>
<body>
<?php
function countUp(){
  static $count = 0; // 初期化
  $count += 1; // カウントアップ
  return $count;
}

// 10回実行する
for ($i=1; $i<=10; $i++){
  $num = countUp();
  echo "{$num}回目。";
}
?>
</body>
</html>
