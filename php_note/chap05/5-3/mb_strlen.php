<?php
// 文字数によって料金を計算する
function price(string $str): string {
  $kakaku = 3000; // 基本料金
  // 文字数を調べる
  $length = mb_strlen($str);
  // 11文字目から１文字100円増し
  if ($length>10){
    $kakaku += ($length - 10)*100;
  }
  // ３桁位取り
  $kakaku = number_format($kakaku);
  $result = "{$length}文字 {$kakaku}円";
  return $result;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字数によって料金を計算する</title>
</head>
<body>
<pre>
<?php
// 試す
$msg1 = "Hello World!";
$msg2= "ハローワールド";
echo price($msg1);
echo "\n";
echo price($msg2);
?>
</pre>
</body>
</html>
