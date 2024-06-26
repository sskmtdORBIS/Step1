<?php
// Staffクラスを定義する
class Staff {
  // コンストラクタ
  function __construct(public string $name, public int $age){
  }

  // インスタンスメソッド
  public function hello() {
    if (is_null($this->name)) {
      echo "こんにちは！" . PHP_EOL ;
    } else {
      echo "こんにちは、{$this->name}です！" . PHP_EOL ;
    }
  }
}
// ?>
