<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ユーザ定義関数を使って計算する</title>
</head>
<body>
<?php
function team($name, ...$members){
  print_r($name . PHP_EOL);
  print_r($members);
}

// team()を試す
team("Peach", "佐藤", "田中", "加藤");
?>
</body>
</html>
