<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>正規表現の基本</title>
</head>
<body>
<pre>
<?php
// 探しているナンバーは「4?-49」、?は6〜9の番号
$result1 = preg_match("/4[6-9]-49/u", "確か49-46でした");
$result2 = preg_match("/4[6-9]-49/u", "たぶん46-49だった");
$result3 = preg_match("/4[6-9]-49/u", "41-49かな？");
// 結果
var_dump($result1);
var_dump($result2);
var_dump($result3);
?>
</pre>
</body>
</html>
