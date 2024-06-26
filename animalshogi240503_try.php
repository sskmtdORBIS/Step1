<?php


class BoardAndPiece
{
    public static $pieces = [];
    public static function squarePossibleCheck($owner,$row,$col){
        $pieceCheck = self::getPieceAt($row,$col);
        if ($row < 1 or $row > 4 or $col < 1 or $col > 3) {
            throw new Exception("[$row,$col]は盤外です。盤内の位置を入力して下さい。<br>");
        } else if($pieceCheck != null && $owner == $pieceCheck->owner){
            throw new Exception("[$row,$col]には自駒があるため置けません。");
        } else {
            return [$row,$col];
        }
    }
    public static function getPieceAt($row,$col){
            foreach (self::$pieces as $piece) {
                if ($piece->position['row'] == $row && $piece->position['col'] == $col) {
                    return $piece;
                }
            }
    }

}







class Piece
{
    public $possibleDirections = [];
    public $position = ['row'=>null,'col'=>null];
    public function __construct(public $owner, $row, $col, public $type)
    {
        $this->putPieceAt($owner,$row, $col,$type);
        //表示名称をclass Piece側で定義する（0418宿題）→ 関数の中に持つ（0426宿題）
        //$this->displayName = $this->owner . $this->type[0];
        //possibleDirectionsはtypeに応じてコマのプロパティとして持つ（0428)
        switch ($this->type) {
            case 'Lion':
                $this->possibleDirections = [[-1, -1], [-1, 0], [-1, 1], [0, -1], [0, 1], [1, -1], [1, 0], [1, 1]];
                break;
            case 'Giraffe':
                $this->possibleDirections = [[-1, 0], [1, 0], [0, -1], [0, 1]];
                break;
            case 'Elephant':
                $this->possibleDirections = [[-1, -1], [-1, 1], [1, -1], [1, 1]];
                break;
            case 'Chick':
                $this->possibleDirections = $this->owner === 1 ? [[1, 0]] : [[-1, 0]];
                break;
        }
    }

    public function putPieceAt($owner,$row, $col,$type)
    {
        try{
            $checkPosition = BoardAndPiece::squarePossibleCheck($owner,$row,$col);
            $this->owner = $owner;
            $this->position['row'] = $checkPosition[0];
            $this->position['col'] = $checkPosition[1];
            $this->type = $type;
        } catch(Exception $e){
            $e -> getMessage();
        }
 
    }

    public function __toString()
    {
        return $this->owner . $this->type[0];
    }

    public function getPossibleMoves()
    {
        $moves = [];

        foreach ($this->possibleDirections as $direction) {
            $newRow = $this->position['row'] + $direction[0];
            $newCol = $this->position['col'] + $direction[1];
            if ($newRow >= 1 && $newRow <= 4 && $newCol >= 1 && $newCol <= 3) {
                $moves[] = ['row' => $newRow, 'col' => $newCol];
            }
        }
        return $moves;
    }
}



class Board
{
    function __construct()
    {
        try {
            BoardAndPiece::$pieces[] = new Piece(2, 4, 3, "Elephant");
            BoardAndPiece::$pieces[] = new Piece(2, 4, 4, "Giraffe");
            /*           $this->pieces[] = new Piece(1, "Giraffe", ['row' => 1, 'col' => 1]);
            $this->pieces[] = new Piece(1, "Lion", ['row' => 1, 'col' => 2]);
            $this->pieces[] = new Piece(1, "Elephant", ['row' => 1, 'col' => 3]);
            $this->pieces[] = new Piece(1, "Chick", ['row' => 2, 'col' => 2]);
            $this->pieces[] = new Piece(2, "Chick", ['row' => 3, 'col' => 2]);
            $this->pieces[] = new Piece(2, "Elephant", ['row' => 4, 'col' => 1]);
            $this->pieces[] = new Piece(2, "Lion", ['row' => 4, 'col' => 2]);
            $this->pieces[] = new Piece(2, "Giraffe", ['row' => 4, 'col' => 3]);
 */
        } catch (Exception $e) {
            $err = $e->getMessage();
            exit($err);
        }
    }


    public function viewBoard()
    {
        for ($i = 1; $i <= 4; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                $piece = BoardAndPiece::getPieceAt($i, $j);
                if ($piece != null) {
                    //表示名称をclassBoard側では定義しないでpiece側から呼び出す。（0418宿題）
                    echo $piece . " ";
                } else {
                    echo "__" . " ";
                }
            }
            echo "<br>";
        }
    }

    public function getRisk($i, $j)
    {
        //盤外が指定されたらthrowされたExceptionのメッセージを出力するように変更（0428）
        //getRiskはboolを返す仕様に変更(0502)
        try {
            $piece = BoardAndPiece::getPieceAt($i, $j);
            if ($piece == null) {
                return null;
            } else {
                foreach (BoardAndPiece::$pieces as $others) {
                    if ($piece->owner !== $others->owner) {
                        $possibleMoves = $others->getPossibleMoves();
                        foreach ($possibleMoves as $move) {
                            if ($piece->position['row'] === $move['row'] && $piece->position['col'] === $move['col']) {
                                return true;
                            }
                        }
                    }
                }
                return false;
            }
        } catch (Exception $e) {
            $outOfBoardError = $e->getMessage();
            exit($outOfBoardError);
        }
    }

    //リスクをechoする関数を独立(0502)
    public function echoRisk($i, $j)
    {
        $riskCheckedPiece = $this->getRisk($i, $j);
        if ($riskCheckedPiece === true) {
            echo "次の一手で取られます。<br>";
        } else if ($riskCheckedPiece === false) {
            echo "次の一手では取られません。<br>";
        } else if ($riskCheckedPiece === null) {
            echo "[$i,$j]にはコマがありません。<br>";
        } else {
            echo $riskCheckedPiece;
        }
    }

    //特定のマスのコマを移動させる関数(0430)
    public function movePiece($i, $j, $x, $y)
    {
        $piece = BoardAndPiece::getPieceAt($i, $j);
        $nextCellPiece = BoardAndPiece::getPieceAt($x, $y);
        $MoveTo = ['row' => $x, 'col' => $y];
        if ($piece == null) {
            echo "[$i,$j]にはコマがありません。<br>";
        } else if ($nextCellPiece != null && $piece->owner === $nextCellPiece->owner) {
            echo "[$x,$y]には自駒があるため移動できません。<br>";
        } else {
            $possibleMoves = $piece->getPossibleMoves();
            if (in_array($MoveTo, $possibleMoves)) {
                $piece->position['row'] = $x;
                $piece->position['col'] = $y;
            } else {
                echo "[$i,$j]のコマは[$x,$y]には移動できません。<br>";
            }
        }
    }
}


$board = new Board();

$board->movePiece(4, 2, 3, 3);
$board->viewBoard();

echo $board->echoRisk(3, 3);
echo $board->echoRisk(4, 3);


/*
正しい位置に置いたときは機能しているが、変な位置に置くとおかしくなる
*/