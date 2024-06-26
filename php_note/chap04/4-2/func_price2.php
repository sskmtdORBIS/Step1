<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ユーザ定義関数を使って計算する</title>
</head>
<body>
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

// 2400円を2個購入した場合と1200円を5個購入した場合
$kingaku1 = price(2400, 2);
$kingaku2 = price(1200, 5);
echo "金額1は{$kingaku1}円" . "<br>" . PHP_EOL;
echo "金額2は{$kingaku2}円";
?>
</body>
</html>
