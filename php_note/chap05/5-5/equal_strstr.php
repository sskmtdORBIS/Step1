<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字列を比較する</title>
</head>
<body>
<pre>
<?php
function holiday($youbi){
  if(($youbi == "土曜日")||($youbi == "日曜日")){
    echo $youbi, "はお休みです。", PHP_EOL";
  } else {
    echo $youbi, "はお休みではありません。", PHP_EOL";
  }
}
// 試す
holiday("金曜日");
holiday("土曜日");
holiday("日曜日");
?>
</pre>
</body>
</html>
