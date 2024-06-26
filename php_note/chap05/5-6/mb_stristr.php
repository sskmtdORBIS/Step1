<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>指定文字より後ろの文字を取り出す</title>
</head>
<body>
<pre>
<?php
function pickout($target, $str){
  $result = mb_stristr($target, $str);
  if($result === false){
    echo "(not found)" . PHP_EOL;
  } else {
    echo "{$result}" . PHP_EOL;
  }
}
// 試す
pickout("東京都港区赤坂2-3-4", "赤坂");
pickout("東京都渋谷区神南1-1-1", "渋谷区");
pickout("東京都渋谷区道玄坂5-5-5", "原宿");
?>
</pre>
</body>
</html>
