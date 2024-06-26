<?php
// チェックする番号
$numList = [1008, 1234, 1301];
// 合格番号
$numbers = [1301, 1206, 1008, 1214];
// 合格チェック
function checkNumber($no){
  global $numbers;
  if (in_array($no, $numbers)){
    echo "{$no}番は合格です。";
  } else {
    echo "{$no}番は見つかりません。";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列を検索する</title>
</head>
<body>
<?php
// 結果リスト
echo "<ol>", PHP_EOL;
// $numListの値をすべてチェックする
foreach ($numList as $value) {
  echo "<li>", checkNumber($value), "</li>, PHP_EOL";
}
echo "</ol>, PHP_EOL";
?>
</body>
</html>
