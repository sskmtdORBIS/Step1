<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ユーザ定義関数を使って計算する</title>
</head>
<body>
<?php
function team($name, ...$members){
  // 配列$membersの名前を「、」で連結する
  $list = implode("、", $members);
  return "{$name}：{$list}";
}

// チームを作る
$team1 = team("Peach", "佐藤", "田中", "加藤");
$team2 = team("カボス", "ひろし", "きえこ");
echo $team1 . "<br>" . PHP_EOL;
echo $team2;
?>
</body>
</html>
