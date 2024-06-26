<?php
class Piece
{
    public $possibleDirections = [];
    public function __construct(public $owner, public $type, public $position)
    {
        //盤面からはみ出た位置に置いたときにアラートを出力する（0418宿題）→Exceptionをつかったやり方に変更(0426宿題)
        if ($this->position['row'] > 4 or $this->position['col'] > 3 or $this->position['row'] < 1 or $this->position['col'] < 1) {
            throw new Exception("[{$this->position['row']},{$this->position['col']}]は盤外です。盤内の位置を入力してください。<br>");
        }
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

    public function displayName(){
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
    private $pieces = [];
    private $positions = [];
    function __construct()
    {
        try {
            $this->pieces[] = new Piece(1, "Elephant", ['row' => 4, 'col' => 2]);
            $this->pieces[] = new Piece(2, "Giraffe", ['row' => 4, 'col' => 3]);
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

    public function getPieceAt($row, $col)
    {
        //盤外が指定されたらExceptionを返す（0428）
        if ($row > 4 or $col > 3 or $row < 1 or $col < 1) {
            throw new Exception("[$row,$col]は盤外です。盤面内の位置を指定して下さい。");
        } else {
            foreach ($this->pieces as $piece) {
                if ($piece->position['row'] == $row && $piece->position['col'] == $col) {
                    return $piece;
                }
            }
        }
        return null;
    }

    public function viewBoard()
    {
        for ($i = 1; $i <= 4; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                $piece = $this->getPieceAt($i, $j);
                if ($piece != null) {
                    //表示名称をclassBoard側では定義しないでpiece側から呼び出す。（0418宿題）
                    echo $piece->displayName() . " ";
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
            $piece = $this->getPieceAt($i, $j);
            if ($piece == null) {
                return null;
            } else {
                foreach ($this->pieces as $others) {
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
    public function echoRisk($i,$j){
        $riskCheckedPiece = $this->getRisk($i,$j);
        if($riskCheckedPiece === true){
            echo "次の一手で取られます。<br>";
        } else if($riskCheckedPiece === false){
            echo "次の一手では取られません。<br>";
        } else if($riskCheckedPiece === null){
            echo "[$i,$j]にはコマがありません。<br>";
        } else {
            echo $riskCheckedPiece;
        }
    }

    //特定のマスのコマを移動させる関数(0430)
    public function movePiece($i, $j, $x, $y)
    {
        $piece = $this->getPieceAt($i, $j);
        $nextCellPiece = $this->getPieceAt($x, $y);
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
$board->viewBoard();

$board->movePiece(4, 2, 3, 3);
$board->viewBoard();

echo $board->echoRisk(3, 3);
echo $board->echoRisk(4, 3);
