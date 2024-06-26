<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列にキーがなければ追加する</title>
</head>
<body>
<pre>
<?php
// pointキーがなければ追加する
function newUser($user){
  if (!array_key_exists("point", $user)){
    $user["point"]=0;
  }
  return $user;
}
// メンバーデータ
$user1 =["name"=>"山川静香", "point"=>37];
$user2 =["name"=>"桜野花実"];
$user3 =["name"=>"佐藤潮見"];
// メンバーリストに追加する
$memberList = [];
$memberList[] = newUser($user1);
$memberList[] = newUser($user2);
$memberList[] = newUser($user3);
// リストを確認する
print_r($memberList);
?>
</pre>
</body>
</html>
