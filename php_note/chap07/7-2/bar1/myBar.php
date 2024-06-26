<?php
  // Staffクラスファイルを読み込む
  require_once("Staff.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Staffクラスを読み込んで利用する</title>
</head>
<body>
<pre>
<?php
  // Staffクラスのインスタンスを作る
  $hana = new Staff(name:"花", age:21);
  $taro = new Staff(name:""太郎", age:35);
  // メソッドを実行する
  $hana->hello();
  $taro->hello();
?>
</pre>
</body>
</html>
