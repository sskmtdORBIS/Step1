<?php
require_once("GameBook.php");

class MyGame implements GameBook {
  public int $myPoint = 0;

  function __construct(int $coins = 1){
    $startPoint = 100 * $coins;  // 開始のポイントはコインの100倍
    $this->newGame($startPoint); // ゲーム開始
  }

/* GameBookインターフェースで指定されているメソッド */
  // ニューゲーム
  public function newGame(int $point) {
    $this->myPoint = $point;
    echo "スタート：{$point}ポイント" . PHP_EOL ;
  }
  // ゲーム開始
  public function play() {
    $num = random_int(1,100);
    if ($num%2 == 0){  // 偶数の時
      echo "＋{$num}↑" ;
      $this->myPoint += $num;
    } else {
      echo "ー{$num}↓ " ;
      $this->myPoint -= $num;
    }
    echo "現在{$this->myPoint}ポイント" . PHP_EOL ;
  }
  // 勝敗のチェック
  public function isAlive():bool {
    return ($this->myPoint > 0);
  }
}
// ?>
