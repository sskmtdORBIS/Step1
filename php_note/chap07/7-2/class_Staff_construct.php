<?php
// Staffクラスを定義する
class Staff {
  // インスタンスプロパティ
  public string $name;
  public int $age;

  // コンストラクタ
  function __construct(string $name, int $age){
    // プロパティに初期値を設定する
    $this->name = $name;
    $this->age = $age;
  }

  // インスタンスメソッド
  public function hello() {
    if (is_null($this->name)) {
      echo "こんにちは！" . PHP_EOL;
    } else {
      echo "こんにちは、{$this->name}です！" . PHP_EOL;
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>コンストラクタがあるクラスを利用する</title>
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
