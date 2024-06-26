<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>MyShopクラスを読み込んで試す</title>
</head>
<body>
<pre>
<?php
  // MyShopクラスファイルを読み込む
  require_once("MyShop.php");
  // MyShopクラスのインスタンスを作って試す
  $myObj = new MyShop();
  $myObj->hanbai(tanka:240, kosu:3);
  $myObj->hanbai(tanka:400, kosu:1);
  $myObj->getUriage();
?>
</pre>
</body>
</html>
