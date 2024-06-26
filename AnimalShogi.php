<?php
class Koma {
    public function __construct(public $owner,public $type,public $position){
    }
    public function __toString(){
        return mb_substr($this->type,0,1);
    }
    public function getPossibleMoves(){
        $moves = [];
        $directions = [];

        switch($this->type){
            case 'lion':
                $directions = [[-1,-1],[-1,0],[-1,1],[0,-1],[0,1],[1,-1],[1,0],[1,1]];
                break;
            case 'elephant':
                $directions = [[-1,-1],[-1,1],[1,-1],[1,1]];
                break;
            case 'giraffe':
                $directions = [[-1,0],[0,-1],[0,1],[1,0]];
                break;
            case 'chick':
                $directions = $this->owner === 1 ? [[1,0]] : [[-1,0]];
                break;
        }

        foreach($directions as $dir){
            $newRow = $this->position['row'] + $dir[0];
            $newCol = $this->position['col'] + $dir[1];
            if($newRow >= 1 && $newRow <= 4 && $newCol >= 1 && $newCol <=3){
                $moves[] = ['row'=>$newRow,'col'=>$newCol];
            }
        }
        return $moves;
    }
}



class Board {
    private $pieces = [];
    function __construct(){
        $this->pieces[] = new Koma(1,"giraffe",['row'=>1,'col'=>1]);
        $this->pieces[] = new Koma(1,"lion",['row'=>1,'col'=>2]);
        $this->pieces[] = new Koma(1,"elephant",['row'=>1,'col'=>3]);
        $this->pieces[] = new Koma(1,"chick",['row'=>2,'col'=>2]);
        $this->pieces[] = new Koma(2,"chick",['row'=>3,'col'=>2]);
        $this->pieces[] = new Koma(2,"elephant",['row'=>4,'col'=>1]);
        $this->pieces[] = new Koma(2,"lion",['row'=>4,'col'=>2]);
        $this->pieces[] = new Koma(2,"giraffe",['row'=>4,'col'=>3]);
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
                    echo $piece->owner.$piece->type[0]." ";
                } else {
                    echo "__"." ";
                }
            }
            echo "<br>";
        }
    }


    public function Gotrisk($piece){
        if($piece == null){
            echo "そのマスにはコマがありません";
        } else {
            foreach ($this->pieces as $otherPiece){
                if($otherPiece->owner !== $piece->owner){
                    $possibleMoves = $otherPiece->getPossibleMoves();
                    foreach($possibleMoves as $move){
                        if($move['row']===$piece->position['row'] && $move['col']===$piece->position['col']){
                            return "取られます";
                        }
                    }
             }
            }   
            return "取られません";
        }
    }
}


$board = new Board();
$board -> viewboard();
$piece = $board -> getPieceAt(1,1);
echo $board -> Gotrisk($piece);
?>