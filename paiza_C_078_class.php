<?php

class Stock_sim {
    private $NDU;
    private $costs;
    public function __construct($NDU,$costs){
        $this->NDU = $NDU;
        $this->costs = $costs;
    } 
    
    public function stocksimulate(){
        $stock = 0;
        $PL = 0;
        for($i=0;$i<$this->NDU[0]-1;$i++){
            if($this->costs[$i]<=$this->NDU[1]){
                $stock++;
                $PL -= $this->costs[$i];
            } else if($this->costs[$i]>=$this->NDU[2]) {
                $PL += $this->costs[$i]*$stock;
                $stock = 0;
            }
        }
        $PL += $stock * array_pop($this->costs);
        return $PL;
    }
}

//日数Nと下限D、上限Uを取得する

$NDU = explode(" ",trim(fgets(STDIN)));

//日毎の株価を配列に入れる

$costs = [];
for($i=0;$i<$NDU[0];$i++){
    $costs[]=trim(fgets(STDIN));
}

$PLSIM = new Stock_sim($NDU,$costs);
echo $PLSIM->stocksimulate();



?>