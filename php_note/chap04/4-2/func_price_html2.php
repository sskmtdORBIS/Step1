<?php
function price($tanka, $kosu) {
  $souryo = 250;
  $ryoukin = $tanka * $kosu;
  // 5000円未満は送料250円
  if ($ryoukin<5000){
    $ryoukin += $souryo;
  }
  return $ryoukin;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ユーザ定義関数をHTMLコードに組み込む</title>
</head>
<body>
2400円を2個購入した場合の金額は
<?php
$kingaku1 = price(2400, 2);
echo "{$kingaku1}円"
?>
<br>

1200円を5個購入した場合の金額は
<?php
$kingaku2 = price(1200, 5);
echo "{$kingaku2}円";
?>
</body>
</html>
