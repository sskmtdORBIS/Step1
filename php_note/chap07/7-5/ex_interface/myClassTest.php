<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>MyClassクラスを読み込んで利用する</title>
</head>
<body>
<pre>
<?php
  // MyClassクラスファイルを読み込む
  require_once("MyClass.php");
  // MyClassクラスのインスタンスを作る
  $myObj = new MyClass();
  $myObj->hello();
?>
</pre>
</body>
</html>
