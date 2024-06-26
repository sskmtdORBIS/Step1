<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列を正規表現で検索置換して表示する</title>
</head>
<body>
<pre>
<?php
$data = [];
$data[] =["name"=>"井上真美", "age"=>37, "phone"=>"090-4321-9999"];
$data[] =["name"=>"坂田京子", "age"=>32, "phone"=>"06-3434-7788"];
$data[] =["name"=>"石岡　稔", "age"=>29, "phone"=>"0467-89-9191"];
$data[] =["name"=>"多田優美", "age"=>35, "phone"=>"59-1212"];
$pattern = "/(-)\d{4}$/";
$replacement = "$1****";
// 配列から値を取り出す
foreach ($data as $user) {
  // 電話番号の末尾４桁を伏せ文字に置換する
  $result = preg_replace($pattern, $replacement, $user);
  // 配列のキーと値を表示する
  foreach ($result as $key => $value) {
    echo "{$key}：", $value, PHP_EOL;
  }
}
?>
</pre>
</body>
</html>
