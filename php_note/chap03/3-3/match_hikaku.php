<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>matchとswitchの比較の違い</title>
</head>
<body>
<?php
$num = "99";
// switchの場合
switch ($num){
  case 1:
    $result_switch = "普通";
    break;
  case 99:
    $result_switch = "当たり";
    break;
  default:
    $result_switch = "該当無し";
    break;
}
echo "switchの判定　{$result_switch} <br>";

// matchの場合
$result_match = match($num){
  1 => "普通",
  99 => "当たり",
  default => "該当無し",
};
echo "matchの判定　{$result_match}";
?>
</body>
</html>
