<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>match式で関数を実行する</title>
</head>
<body>
<?php
$course = "B"; //Bコースの場合
$price = match($course){
  "A" => diner(2800),
  "B" => diner(4000),
};
// 関数定義
function diner($total){
  $time = date("G", time());
    if ($time>=21) {
      $total += 500; // 21時以降は500円追加
    }
  return $total;
}
// 表示して確認
$now = date("G:i", time());
echo "{$course}コースは{$price}円。{$now}";
?>
</body>
</html>
