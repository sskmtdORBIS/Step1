<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>マッチした値を置換する</title>
</head>
<body>
<pre>
<?php
function numbermask($subject){
  // クレジットカード番号パターン
  $pattern = "/^\d{4}\s?\d{4}\s?\d{4}\s?\d{2}(\d{2})$/";
  $replacement = "**** **** **** **$1";
  $result = preg_replace($pattern, $replacement, $subject);
  // 実行結果をチェックする
  if (is_null($result)) {
    return "エラー：" . preg_last_error();
  } else if ($result == $subject) {
    return "番号エラー";
  } else {
    return $result;
  }
}
// 番号をチェックして伏せ文字にする
$number1 = "1234 5678 9012 3456";
$number2 = "6543210987654321";
$num1 = numbermask($number1);
$num2 = numbermask($number2);
echo "{$number1}は次のようになります。", PHP_EOL;
echo $num1, PHP_EOL;
echo "{$number2}は次のようになります。", PHP_EOL;
echo $num2, PHP_EOL;
?>
</pre>
</body>
</html>
