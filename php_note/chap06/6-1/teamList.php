<?php
// 配列を使ってチーム分けする
$teamA = ["赤井一郎", "伊藤五郎", "上野信二"];
$teamB = ["江藤幸代", "小野幸子"];
// チームメンバーの名前をリスト表示する
function teamList($teamname, $namelist){
  echo "{$teamname}", PHP_EOL;
  echo "<ol>", PHP_EOL;
  for($i=0; $i<count($namelist); $i++){
    echo "<li>", $namelist[$i], "</li>", PHP_EOL;
  }
  echo "</ol>", PHP_EOL;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>名前のリスト</title>
</head>
<body>
<!-- チームの表示 -->
<?php
teamList('Aチーム', $teamA);
teamList('Bチーム', $teamB);
?>
</body>
</html>
