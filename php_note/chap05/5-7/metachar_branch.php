<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>メタ文字 分岐</title>
</head>
<body>
<pre>
<?php
// 東京または横浜にマッチする
$pattern = "/東京|横浜/u";
var_dump(preg_match($pattern, "東京タワー"));
var_dump(preg_match($pattern, "横浜駅前"));
var_dump(preg_match($pattern, "新東京美術館"));
var_dump(preg_match($pattern, "東横ホテル"));
?>
</pre>
</body>
</html>
