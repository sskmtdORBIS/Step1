<?php
abstract class ShopBiz {
  // 抽象メソッド
  abstract function thanks();
  // インスタンスメンバー
  protected $uriage = 0;
  protected function sell(int $price = 0){
    echo "{$price}円です。";
    $this->uriage += $price;
    // 子クラスで実装されるメソッドを呼び出す
    $this->thanks("");
  }
}
// ?>
