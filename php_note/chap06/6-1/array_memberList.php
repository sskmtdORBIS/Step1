<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <title>名前の配列</title>
</head>
<body>
<pre>
<?php
// 連想配列を使ってメンバーの名前と年齢を管理する
$member1 = ['name' => '赤井一郎', 'age' => 29];
$member2 = ['name' => '伊藤五郎', 'age' => 32];
$member3 = ['name' => '上野信二', 'age' => 37];
$member4 = ['name' => '江藤幸代', 'age' => 26];
$member5 = ['name' => '小野幸子', 'age' => 32];

// 配列を使ってチーム分けする
$teamA = [$member1, $member2, $member3];
$teamB = [$member4, $member5];

// 確認する
print_r($teamA);
?>
</pre>
</body>
</html>
