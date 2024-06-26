<?php
require_once("../../lib/util.php");
// 保存する連想配列
$gamedata = ["name"=>"マッキー", "age"=>19, "avatar"=>"blue_snake", "level"=>"a02wr215"];
// 連想配列をクエリ文字列にする
$dataQueryString = array2queryString($gamedata);
// クッキーに保存する（）
$result = setcookie("gamedata", $dataQueryString, time()+60*5);
?>

<?php
// 連想配列のキーと値をクエリ文字列に変換する
function array2queryString(array $variable): string {
  $data = [];
  foreach ($variable as $key => $value) {
    $data[] = "{$key}={$value}";
  }
  // クエリ文字列を作る
  $queryString = implode("&", $data);
  return $queryString;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>クッキーを保存する</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  if ($result) {
    echo "ゲームデータを保存しました。", "<hr>";
    echo '<a href="check_cookie.php">クッキーを確認する</a>';
  } else {
    echo '<span class="error">クッキーが利用できませんでした。</span>';
  }
  ?>
</div>
</body>
</html>
