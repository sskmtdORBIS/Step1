<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列に新規の値だけ追加する</title>
</head>
<body>
<pre>
<?php
// 配列に新規の値のみを追加する
function array_addUnique(&$array, $value){
  if (in_array($value, $array)){
    return false;
  } else {
    // 値を追加する
    $array[] = $value;
    return true;
  }
}
// 試す
$myList = ["blue", "green"];
array_addUnique($myList, "white");
array_addUnique($myList, "blue");
array_addUnique($myList, "red");
array_addUnique($myList, "white");
print_r($myList);
?>
</pre>
</body>
</html>
