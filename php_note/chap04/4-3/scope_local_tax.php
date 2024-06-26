<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>誤ったコード</title>
</head>
<body>
<?php
// 税金
$tax = 0.1;

// 料金を計算する
function taxPrice($tanka, $kosu){
  $ryoukin = $tanka * $kosu * (1+$tax);
  echo "{$ryoukin}円です。";
}
// 実行する
taxPrice(tanka:250, kosu:4);
echo "税込み" . $tax*100 , "%";
?>
</body>
</html>
