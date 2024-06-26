<?php
class Piece {
    public $displayName;
    public function __construct(public $owner,public $type,public $position){
        if($this->position['row']>4 or $this->position['col']>3){
            echo "[{$this->position['row']},{$this->position['col']}]は盤外です。盤内の位置を入力してください。<br>";
        }
        $displayName = $this->owner.$this->type[0];
    }
}



class Board {
    private $pieces = [];
    private $positions = [];
    function __construct(){
        $this->pieces[] = new Piece(1,"Giraffe",['row'=>1,'col'=>1]);
        $this->pieces[] = new Piece(1,"Lion",['row'=>1,'col'=>2]);
        $this->pieces[] = new Piece(1,"Elephant",['row'=>1,'col'=>3]);
        $this->pieces[] = new Piece(1,"Chick",['row'=>2,'col'=>2]);
        $this->pieces[] = new Piece(2,"Chick",['row'=>3,'col'=>2]);
        $this->pieces[] = new Piece(2,"Elephant",['row'=>4,'col'=>1]);
        $this->pieces[] = new Piece(2,"Lion",['row'=>4,'col'=>2]);
        $this->pieces[] = new Piece(2,"Giraffe",['row'=>4,'col'=>3]);
        foreach($this->pieces as $piece){
            $this->positions[] = $piece->position['row'].$piece->position['col'];
        }
        if(max(array_count_values($this->positions))>=2){
            echo "コマの位置に重複があります。重複がないようにして下さい。<br>";
        };

    }

    public function getPieceAt($row,$col){
        foreach($this->pieces as $piece){
            if($piece->position['row']== $row && $piece->position['col'] == $col){
                return $piece;
            }
        }
        return null;
    }

    public function viewboard (){
        for($i=1;$i<=4;$i++){
            for($j=1;$j<=3;$j++){
                $piece = $this->getPieceAt($i,$j);
                if($piece != null){
                    echo $piece->displayName." ";
                } else {
                    echo "__"." ";
                }
            }
            echo "<br>";
        }
    }

}


$board = new Board();
$board -> viewboard();
?>