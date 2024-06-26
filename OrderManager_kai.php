<?php
class OrderManager{
    private array $orderlist =[];

    public function addOrder(array $items, array $allergys=[], string $memo=""):void {
        $this->orderlist[] = new Order($items, $allergys, $memo);
    }

    function __construct(public array $items, public array $allergys = [], public string $memo = "") {

    }


    public function nextOrder():string{
        $order = array_shift($this->orderlist);

        $date = $order?->getDate();
        $items = $order?->items;
        $allergys = $order?->allergys;
        $memo = $order?->memo;

        $items = ($items != null) ? implode("、", $items) : "";
        $allergys = ($allergys != null) ? ("【アレルギー】".implode("、",$allergys)) : "";
        $memo = ($memo != null) ? "(メモ:{$memo})" : "";

        $orderdata = "{$date}{$items}{$allergys}{$memo}";

        return $orderdata;
    }
}

class Order {
    private DateTime $date;

 
    public function getDate():string{
        return $this->date->format("Y/m/d H:i");
    }
}

