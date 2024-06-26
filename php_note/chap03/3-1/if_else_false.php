<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>45点のとき、elseブロックが実行される</title>
</head>
<body>
<?php
$tokuten = 45;
if ($tokuten>=80) {
  echo "素晴らしい!";
} else {
  echo "もう少しがんばりましょう！";
}
echo "{$tokuten}点でした。"
?>
</body>
</html>
