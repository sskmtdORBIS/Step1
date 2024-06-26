<?php
  // Staffクラスファイルを読み込む
  require_once("Staff.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Staffクラスメンバーを使う</title>
</head>
<body>
<pre>
<?php
// クラスメソッドを実行する
Staff::deposit(100);
Staff::deposit(150);
// クラスプロパティを確認する
echo Staff::$piggyBank, "円になりました。\n";

// インスタンスを作る
$hana = new Staff(name:"花", age:21);
// インスタンスメソッドを実行する
$hana->latePenalty();
// クラスプロパティを確認する
echo Staff::$piggyBank, "円になりました。\n";
?>
</pre>
</body>
</html>
