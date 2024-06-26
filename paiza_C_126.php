<?php


class Costculc {
    private $ABN;
    private $intern;
    
    public function __construct($ABN,$intern){
        $this-> ABN = $ABN;
        $this-> intern = $intern;
    }
    
    public function calccost(){
        for($i=0;$i<$this->ABN[2]-1;$i++){
            if(($this->intern[$i+1][0]-$this->intern[$i][1])*$this->ABN[1] > $this->ABN[0]*2){
                $cost += $this->ABN[0]*2;
            } else {
                $cost += $this->ABN[1]*($this->intern[$i+1][0]-$this->intern[$i][1]);
            }
        }
        $cost += $this->ABN[0]*2;
        return $cost;
    }
}



//片道交通費A宿泊費Bインターン回数Nを取得する
$ABN=explode(" ",trim(fgets(STDIN)));

//インターン期間を２次元配列で持たせる
for($i=0;$i<$ABN[2];$i++){
    $intern[] = explode(" ",trim(fgets(STDIN)));
}


//classを採用して計算する

$calculation = new Costculc($ABN,$intern);
echo $calculation->calccost();




?>