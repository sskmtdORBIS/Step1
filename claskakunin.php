<?php

class OrderManager{
    private array $orderlist = [];

    public function addOrder(array $items = [], array $allergys=[],string $memo = ""):void {
        $this->orderlist[] = new Order($items,$allergys,$memo);
    }

    public function nextOrder():string{
        $order = array_shift($this->orderlist);

    $items = $order?->items;
    $allergys = $order?->allergys;
    $memo = $order?->memo;

    $items = implode(",",$items);
    $allergys = implode(",",$allergys);
 
    $orderdata = "{$items},{$allergys},{$memo}";
    return $orderdata;
    }

}

class Order {
    
    function __construct(public array $items,public array $allergys,public string $memo){
    }
}

?>

<?php

$theOrder = new OrderManager();
$theOrder->addOrder(items:["aaaa","bbbb","cccc"] ,allergys:["xxx","yyy"],memo :"sdfgh");
$theOrder->addOrder(items:["ttaa","ttbb","ttcc"] ,allergys:["txx","tyy"],memo :"whatsdfgh");
print_r($theOrder);

$orderstring = $theOrder->nextOrder();
echo $orderstring;
$orderstring = $theOrder->nextOrder();
echo $orderstring;

print_r($theOrder);



?>