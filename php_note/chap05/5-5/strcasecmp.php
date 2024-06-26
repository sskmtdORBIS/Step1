<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>strcasecmp()を使って比較する</title>
</head>
<body>
<?php
$id1 = "AB12R";
$id2 = "ab12r";
// 大文字小文字を区別せずに比較する
$result = strcasecmp($id1, $id2);
echo "{$id1}と{$id2}を比較した結果、";
if ($result == 0){
  echo "一致しました。";
} else {
  echo "一致しません。";
}
?>
</body>
</html>
