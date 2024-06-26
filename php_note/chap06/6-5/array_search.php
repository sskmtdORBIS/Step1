<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列を検索して見つかった値のキーを返す</title>
</head>
<body>
<pre>
<?php
// 名前の配列
$nameList = ["m01"=>"田中達也", "m02"=>"佐々木真一", "w01"=>"新井貴子", "w02"=>"笠井　香"];
// 年齢の配列
$ageList = ["m01"=>34, "m02"=>42, "w01"=>28, "w02"=>41];
// 名前から年齢を調べる
function getAge($name){
  global $nameList;
  global $ageList;
  // 見つかった名前のキーを取り出す
  $key = array_search($name, $nameList);
  if ($key !== false){
    // $ageListの同じキーの年齢を取り出す
    $age = $ageList[$key];
    echo "{$name}さんは{$age}歳です。";
  } else {
    echo "「{$name}」はメンバーではない。";
  }
}
echo getAge("新井貴子"), PHP_EOL;
echo getAge("田中達也"), PHP_EOL;
echo getAge("林　純一"), PHP_EOL;
echo getAge("佐々木真一"), PHP_EOL;
?>
</pre>
</body>
</html>
