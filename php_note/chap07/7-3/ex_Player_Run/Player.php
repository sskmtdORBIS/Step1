<?php
// Playerクラスを定義する
class Player {
  // コンストラクタ
  function __construct(public string $name = '名無し'){
  }

  // ストリングにキャストされたとき返す文字列
  public function __toString() {
    return $this->name;
  }

  // インスタンスメソッド
  public function who() {
    echo "{$this->name}です。" . PHP_EOL ;
  }
}
// ?>
