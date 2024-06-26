<?php
class OrderManager {
  private array $orderlist = [];

  // オーダーを追加する
  public function addOrder(array $items, array $allergys=[], string $memo=""):void {
    // Orderオブジェクトを作って配列$orderlistに追加する
    $this->orderlist[] = new Order($items, $allergys, $memo);
  }

  //次のオーダーを取りだしてストリングで返す
  public function nextOrder():string {
    // 先頭のオーダーを取りだして$orderlistから取り除く
    $order = array_shift($this->orderlist);

    // オーダーの情報を取り出す
    if ($order == null){
      return "";  // 中断する
    }
    $date = $order->getDate();
    $items = $order->items;
    // 配列からストリングを作る
    $items = ($items != null) ? implode("、", $items) : "";
    // 戻り値のストリングを作る
    $orderdata = "{$date} {$items}";

    // infoオブジェクトの情報を取り出す
    $info = $order->info;
    if ($info != null){
      $allergys = $info->allergys;
      $memo = $info->memo;
      // 配列からストリングを作る、項目名を付ける
      $allergys = ($allergys != null) ? ("【アレルギー】".implode("、", $allergys)) : "";
      $memo =  ($memo != null) ? "（メモ：{$memo}）" : "";
      // 戻り値のストリングに追加する
      $orderdata = $orderdata . "{$allergys} {$memo}";
    }

    return $orderdata;
  }
}

// オーダーを作るクラス
class Order {
  private DateTime $date;
  public Info|null $info = null;

  function __construct(public array $items, array $allergys, string $memo) {
    // オーダーの作成日時
    $this->date = new DateTime();
    // アレルギーかメモがある場合だけinfoにInfoオブジェクトを設定する
    if (($allergys !=[]) || ($memo != "")){
      $this->info = new Info($allergys, $memo);
    }
  }

 // 日付オブジェクトを日付のストリングで返す
  public function getDate():string {
    return $this->date->format("Y/m/d H:i");
  }
}

// Infoオブジェクトを作るクラス
class Info {
  function __construct(public array $allergys=[], public string $memo="") {
  }
}
// ?>
