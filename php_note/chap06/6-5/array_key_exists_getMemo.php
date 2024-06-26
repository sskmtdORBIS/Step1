<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列にキーがあるかどうか調べる</title>
</head>
<body>
<pre>
<?php
// memoキーがあるユーザーを調べる
function getMemo($user){
  // memoキーがあれば追加する
  if (array_key_exists("memo", $user)){
    $profile = $user . ":" . $user["memo"] ;
  }
  return $profile;
}
// ユーザーデータ
$user1 =["name"=>"山川静香", "age"=>27];
$user2 =["name"=>"桜野花実", "age"=>38, "memo"=>"書道八段"];
$user3 =["name"=>"辻山冴子", "age"=>31];
$userList = [$user1, $user2, $user3];
// memoキーがあるユーザーを調べる
foreach ($userList as $user) {
  if (array_key_exists("memo", $user)){
    echo $user["name"], ":", $user["memo"], PHP_EOL;
  }
}
?>
</pre>
</body>
</html>
