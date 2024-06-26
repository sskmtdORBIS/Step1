<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>年齢によって料金を振り分ける（切り捨て）</title>
</head>
<body>
<?php
$age = 15.7; //年齢が15.7歳の場合
$age = floor($age); // 年齢の端数を切り捨てる
if ($age<13) {
  $price = 0;
} else if ($age<=15) {
  $price = 500;
} else if ($age<=19) {
  $price = 1000;
} else {
  $price = 2000;
}
echo "{$age}歳なので{$price}円です。"
?>
</body>
</html>
