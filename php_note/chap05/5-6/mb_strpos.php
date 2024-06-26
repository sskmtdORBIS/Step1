<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字列を検索する</title>
</head>
<body>
<pre>
<?php
function check($target, $str){
  $result = mb_strpos($target, $str);
  if($result === false){
    echo "「{$str}」は「{$target}」には含まれていません。", PHP_EOL;
  } else {
    echo "「{$str}」は「{$target}」の", $result+1, "文字目にあります。", PHP_EOL;
  }
}
// 試す
check("東京都渋谷区神南", "渋谷");
check("東京都渋谷区神南", "新宿");
check("PHP, Swift, C++", "PHP");
check("PHP, Swift, C++", "Python");
?>
</pre>
</body>
</html>
