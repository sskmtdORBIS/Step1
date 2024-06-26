<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>クラスからインスタンスを作る</title>
</head>
<body>
<pre>
<?php
// コックを定義する
class Cook {
  public $age;

  public function omlete() {
    echo "オムレツを作ります。";
  }
}

// コックを作る
$cook1 = new Cook();
$cook2 = new Cook();
$cook1->omlete();
$cook2->age = 26;
echo $cook2->age;
?>
</pre>
</body>
</html>
