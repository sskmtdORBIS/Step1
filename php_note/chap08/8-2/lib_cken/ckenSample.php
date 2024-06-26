
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>不正なエンコーディングによる攻撃対策 cken()</title>
  <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>

<?php
// util.phpを読み込む
require_once("lib/util.php");
// Shift-JISのデータを用意する
$utf8_string = "こんにちは。";
$sjis_string = mb_convert_encoding($utf8_string, 'Shift-JIS');
// 内部エンコーディングを調べる
$encoding = mb_internal_encoding();
// cken()でチェックする
if (cken([$sjis_string])) {
  echo '配列の値は、', $encoding, 'です。';
} else {
  echo '配列の値は、', $encoding, 'ではありません。';
}
?>

</div>
</body>
</html>
