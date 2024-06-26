<?php
// Playerクラス定義ファイルを読み込む
require_once("Player.php");
// Runnerクラスを定義する
class Runner extends Player {
  // コンストラクタ
  function __construct(string $name, public int $age){
    // 親クラスのコンストラクタを呼ぶ
    parent::__construct($name);
  }

  // オーバーライドする
  public function who() {
    echo "{$this->name}、{$this->age}歳です。" . PHP_EOL ;
  }

  // インスタンスメソッド
  public function play() {
    echo "{$this->name}が走る！" . PHP_EOL ;
  }
}
// ?>
