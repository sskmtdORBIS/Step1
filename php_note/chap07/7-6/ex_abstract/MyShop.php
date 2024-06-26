<?php
require_once("ShopBiz.php");

class MyShop extends ShopBiz {
  // ShopBiz抽象クラスで指定されている抽象メソッド
  public function thanks(){
    echo "ありがとうございました。" . PHP_EOL ;
  }

  // 販売する
  public function hanbai(int $tanka, int $kosu){
    $price = $tanka * $kosu;
    // ShopBiz抽象クラスから継承しているメソッドを実行
    $this->sell($price);
  }
  // 売上合計を調べる
  public function getUriage(){
    echo "売上合計は、{$this->uriage}円です。";
  }
}
// ?>
