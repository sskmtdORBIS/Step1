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
?>
</body>
</html>
