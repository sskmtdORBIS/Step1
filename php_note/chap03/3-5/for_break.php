<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>マイナスの値があったら繰り返しを中断する</title>
</head>
<body>
<?php
$list = array(20, -32, 50, -5, 40);
$count = count($list); // 配列の値の個数
$sum = 0;
for ($i=0; $i<$count; $i++){
  // 配列$listから値を１つずつ取り出す
  $value = $list[$i];
  if ($value<0){
    $sum = "マイナスの値{$value}が含まれていたので中断しました。";
    break;
  } else {
    $sum += $value;
  }
}
echo "合計：$sum";
?>
</body>
</html>
