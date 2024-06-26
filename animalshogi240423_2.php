<?php
class Piece {
    public $displayName;
    public function __construct(public $owner,public $type,public $position){
        //盤面からはみ出た位置に置いたときにアラートを出力する（0418宿題）
        if($this->position['row']>4 or $this->position['col']>3 or $this->position['row']<1 or $this->position['col']<1){
            echo "[{$this->position['row']},{$this->position['col']}]は盤外です。盤内の位置を入力してください。<br>";
        }
        //表示名称をclass Piece側で定義する（0418宿題）
        $this->displayName = $this->owner.$this->type[0];
    }

    public function getPossibleMoves(){
        $moves = [];
        $possibleDirections = [];
        switch($this->type){
            case 'Lion':
                $possibleDirections = [[-1,-1],[-1,0],[-1,1],[0,-1],[0,1],[1,-1],[1,0],[1,1]];
                break;
            case 'Giraffe':
                $possibleDirections = [[-1,0],[1,0],[0,-1],[0,1]];
                break;
            case 'Elephant':
                $possibleDirections = [[-1,-1],[-1,1],[1,-1],[1,1]];
                break;
            case 'Chick':
                $possibleDirections = $this->owner===1 ? [[1,0]] : [[-1,0]];
                break;
        }
        foreach($possibleDirections as $direction){
            $newRow = $this->position['row'] + $direction[0];
            $newCol = $this->position['col'] + $direction[1];
            if($newRow>=1 && $newRow<=4 && $newCol>=1 && $newCol<=3){
                $moves[] = ['row'=>$newRow,'col'=>$newCol];
            }
        }
        return $moves;
    }
}



class Board {
    private $pieces = [];
    private $positions = [];
    function __construct(){
        $this->pieces[] = new Piece(1,"Giraffe",['row'=>5,'col'=>1]);
        $this->pieces[] = new Piece(2,"Elephant",['row'=>3,'col'=>2]);
 //       $this->pieces[] = new Piece(1,"Chick",['row'=>2,'col'=>2]);
/*      $this->pieces[] = new Piece(1,"Lion",['row'=>1,'col'=>2]);
        $this->pieces[] = new Piece(1,"Elephant",['row'=>2,'col'=>3]);
        $this->pieces[] = new Piece(1,"Chick",['row'=>2,'col'=>2]);
        $this->pieces[] = new Piece(2,"Chick",['row'=>3,'col'=>2]);
        $this->pieces[] = new Piece(2,"Elephant",['row'=>3,'col'=>1]);
        $this->pieces[] = new Piece(2,"Lion",['row'=>4,'col'=>2]);
        $this->pieces[] = new Piece(2,"Giraffe",['row'=>3,'col'=>3]);
*/
        //コマが置かれた位置ごとにコマの数を数え、初期位置で２個以上置かれた場合、アラートを出力する。（0418宿題）
        foreach($this->pieces as $piece){
            $this->positions[] = $piece->position['row'].$piece->position['col'];
        }
        if(max(array_count_values($this->positions))>=2){
            echo "コマの位置に重複があります。重複がないようにして下さい。<br>";
        };

    }
    //間違いサンプル　これだと将棋のプレイを想定すると機能しない
    public function positionCheck(){
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

    public function viewBoard (){
        for($i=1;$i<=4;$i++){
            for($j=1;$j<=3;$j++){
                $piece = $this->getPieceAt($i,$j);
                if($piece != null){
                    //表示名称をclassBoard側では定義しないでpiece側から呼び出す。（0418宿題）
                    echo $piece->displayName." ";
                } else {
                    echo "__"." ";
                }
            }
            echo "<br>";
        }
    }

    public function getRisk ($i,$j){
        $piece = $this->getPieceAt($i,$j);
        if($piece==null){
            echo "そのマスにコマはありません。";
        } else {
            foreach($this->pieces as $others){
                if($piece->owner !== $others->owner){
                    $possibleMoves = $others->getPossibleMoves();
                    foreach($possibleMoves as $move){
                        if($piece->position['row']===$move['row']&&$piece->position['col']===$move['col']){
                            return "取られます。";
                        }
                    }
                }

            }
            return "取られません。";
        }
    }
}


$board = new Board();
$board -> viewBoard();
echo $board->getRisk(2,1);   

?>