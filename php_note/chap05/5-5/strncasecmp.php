<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>前方一致で比較する</title>
</head>
<body>
<pre>
<?php
function check($str2){
  $str1 = "ABC";
  // $str2がstr1ではじまっているかどうかをチェックする
  $result = strncasecmp($str1, $str2, strlen($str1));
  echo "{$str2}は";
  if ($result == 0){
    echo "{$str1}で始まる。" . PHP_EOL;
  } else {
    echo "その他。" . PHP_EOL;
  }
}
// チェックする文字
$id1 = "ABCR70";
$id2 = "xbcM65";
$id3 = "AbcW71";
$id4 = "xABC68";
check($id1);
check($id2);
check($id3);
check($id4);
?>
</pre>
</body>
</html>
