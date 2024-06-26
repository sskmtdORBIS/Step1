<?php
// Staffクラスを定義する
class Staff {
  // クラスプロパティ
  public static $piggyBank = 0;
  // クラスメソッド
  public static function deposit(int $yen = 0) {
    self::$piggyBank += $yen;
  }

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

  // 遅刻して罰金
  public function latePenalty(){
    echo "{$this->name}さんが遅刻して罰金を払いました。" . PHP_EOL ;
    // スタティックメソッドを実行
    self::deposit(1000);
  }
}
// ?>
