<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列の要素で関数を繰り返し実行する</title>
</head>
<body>
<pre>
<?php
// 通貨換算してリスト表示するコールバック関数
function exchangeList(&$value, $key, $rateData){
  // レート換算する
  $rate = $rateData["rate"];
  if ($rate == 0) {
    return;
  }
  // レート換算して置き換える
  $value = round($value/$rate, 2);
  // 通貨記号を付ける
  $value = $rateData["symbol"] . (string)$value;
}

// 円での値段
$priceList = [2300, 1200, 4000];
// 円／ドルのレート
$dollaryen = ["symbol"=>'$', "rate"=>112.50];
// 換算して値を置き換える
array_walk($priceList, "exchangeList", $dollaryen);
print_r($priceList);
?>
</pre>

</body>
</html>
