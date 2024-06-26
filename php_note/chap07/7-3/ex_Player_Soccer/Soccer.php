<?php
// Playerクラス定義ファイルを読み込む
require_once("Player.php");
// Soccerクラスを定義する
class Soccer extends Player {
  // インスタンスメソッド
  public function play() {
    echo "{$this->name}がシュート！" . PHP_EOL ;
  }
}
// ?>
