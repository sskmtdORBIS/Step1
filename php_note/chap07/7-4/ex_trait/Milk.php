<?php
require_once("DateTool.php");
// Milkクラスを定義する
class Milk {
  // DateToolトレイトを使用する
  use DateTool;
  // プロパティ宣言
  public String $theDate;
  public String $limitDate;

  function __construct(){
    // 今日の日付
    $now = new DateTime();
    // 年月日に直して設定する
    $this->theDate = $this->ymdString($now);
    // 10日後の日付
    $this->limitDate = $this->addYmdString($now, 10);
  }
}
// ?>
