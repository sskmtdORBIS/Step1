<?php
//Exceptionクラスを継承したInvalidPositionExceptionを定義　（メモ：盤面の位置として不適切な入力があった場合の例外）
class InvalidPositionException extends Exception
{
    //$row,$colを引数として渡したコンストラクタを定義
    public function __construct($row, $col)
    {
        //Exceptionクラスのコンストラクタをオーバーライドして例外メッセージを引数として渡す
        parent::__construct("[$row,$col]は盤面の位置として不適切です。盤面内の位置を入力して下さい。");
    }
}


//Exceptionクラスを継承したNoPieceExceptionを定義 （メモ：指定の位置に駒がない場合の例外）
class NoPieceException extends Exception
{
    //$row,$colを引数として渡したコンストラクタを定義
    public function __construct($row, $col)
    {
        //Exceptionクラスのコンストラクタをオーバーライドして例外メッセージを引数として渡す
        parent::__construct("[$row,$col]には駒がありません。");
    }
}


class Piece
{
    //possibleDirections配列を定義
    public $possibleDirections = [];

    //$owner,$type(ownerとtypeのプロパティ宣言を兼ねる)を仮引数として渡したコンストラクタを定義
    public function __construct(public $owner, public $type)
    {
        //$this->ownerに$ownerを代入する
        $this->owner =  $owner;
        //$this->typeに$typeを代入する
        $this->type = $type;

        //switch条件に$this->typeを渡す
        switch ($this->type) {
                //caseにtypeを渡し、動ける向きを配列で$possibleDirectionsの要素に渡す
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

    //マジックメソッド__toStringを定義
    public function __toString()
    {
        //$this->owner . $this->type[0]を返す
        return $this->owner . $this->type[0];
    }
}

//Boardクラスを定義
class Board
{
    //SquareStatus配列プロパティを定義　→当初はコンストラクタ内でnullも宣言していたが修正しにくいので先んじて空盤面を宣言する形に変更
    public $boardSquares = [
        '1'=> ['1'=>null,'2'=>null,'3'=>null],
        '2'=> ['1'=>null,'2'=>null,'3'=>null],
        '3'=> ['1'=>null,'2'=>null,'3'=>null],
        '4'=> ['1'=>null,'2'=>null,'3'=>null],
    ];
    //コンストラクタを定義
    public function __construct()
    {
        //$this->boardSquaresに初期位置を二次元配列の形で代入する→当初コメントアウト案で作ったが修正がしにくいので以下の形に変更（メモ：一次元目を行、二次元目を列とし、キーに行番号と列番号を設定）
        $this->boardSquares[1][1] = new Piece(1,'Giraffe');
        $this->boardSquares[1][2] = new Piece(1,'Lion');
        $this->boardSquares[1][3] = new Piece(1,'Elephant');
        $this->boardSquares[2][2] = new Piece(1,'Chick');
        $this->boardSquares[4][3] = new Piece(2,'Giraffe');
        $this->boardSquares[4][2] = new Piece(2,'Lion');
        $this->boardSquares[4][1] = new Piece(2,'Elephant');
        $this->boardSquares[3][2] = new Piece(2,'Chick');
/*
        $this->boardSquares = [
            '1' => ['1' => new Piece(1, 'Giraffe'), '2' => new Piece(1, 'Lion'), '3' => new Piece(1, 'Elephant')],
            '2' => ['1' => null, '2' => new Piece(1, 'Chick'), '3' => null],
            '3' => ['1' => null, '2' => new Piece(2, 'Chick'), '3' => null],
            '4' => ['1' => new Piece(2, 'Elephant'), '2' => new Piece(2, 'Lion'), '3' => new Piece(2, 'Giraffe')]
        ];
*/
    }

    //viewBoardメソッドを定義
    public function viewBoard(){
        for($i=1;$i<=4;$i++){
            for($j=1;$j<=3;$j++){
                $piece = $this->boardSquares[$i][$j];
                if($piece!=null){
                    echo $piece;
                } else {
                    echo "__";
                }
            }
            echo "<br>";
        }
    }

    //viewBoardメソッドを定義 foreachだとキー番号関係なく出力されてしまうので↑のキー指定で出力する方式に変更
/*
    public function viewBoard()
    {
        //forechに反復対象として$this->boardSquaresを渡し取り出す要素を$rowとする
        foreach ($this->boardSquares as $row) {
            //forechに反復対象として$rowを渡し取り出す要素を$pieceとする
            foreach ($row as $piece) {
                //if条件式に$piece != nullを渡す
                if ($piece != null) {
                    //$pieceを出力する
                    echo $piece;
                } else {
                    //__を出力する
                    echo "__";
                }
            }
            //改行コード<br>を出力する
            echo "<br>";
        }
    }
*/


    //仮引数として$row,$colを渡したisValidInputメソッドを定義
    public function isValidInput($row, $col)
    {
        //if条件式に!is_int($row) or !is_int($col) or $row < 1 or $row > 4 or $col < 1 or $col > 3（メモ：整数ではないまたは盤のマス内ではない）を渡す
        if (!is_int($row) or !is_int($col) or $row < 1 or $row > 4 or $col < 1 or $col > 3) {
            //falseを返す
            return false;
        } else {
            //trueを返す
            return true;
        }
    }


    //仮引数として$row,$colを渡したgetPieceAtメソッドを定義
    public function getPieceAt($row, $col)
    {
        if ($this->isValidInput($row, $col)) {
            return $this->boardSquares[$row][$col];
        } else {
            $err = new InvalidPositionException($row, $col);
            exit($err->getMessage());
        }
    }

    //仮引数として$row,$colを渡したgetPossibleMoveToメソッドを定義
    public function getPossibleMoveTo($row, $col)
    {
        //空配列$possibleMoveToを定義
        $possibleMoveTo = [];

        //if条件式に$this->isValidInput($row, $col)を渡す
        if ($this->isValidInput($row, $col)) {
            //$targetPieceに$this->getPieceAt($row, $col)を代入する
            $targetPiece = $this->getPieceAt($row, $col);
            //if条件式に$targetPiece != nullを渡す
            if ($targetPiece != null) {
                //forechに反復対象として$targetPiece->possibleDirectionsを渡し取り出す要素を$possibleDirectionとする
                foreach ($targetPiece->possibleDirections as $possibleDirection) {
                    //$nextRowに$row + $possibleDirection[0]を代入する
                    $nextRow = $row + $possibleDirection[0];
                    //$nextColに$col + $possibleDirection[1]を代入する
                    $nextCol = $col + $possibleDirection[1];
                    //if条件式に$this->isValidInput($nextRow, $nextCol)を渡す
                    if ($this->isValidInput($nextRow, $nextCol)) {
                        //$possibleMoveTo[]の次の要素に[$nextRow, $nextCol]を渡す
                        $possibleMoveTo[] = [$nextRow, $nextCol];
                    } else {
                    }
                }
            } else {
            }
        } else {
        }
        //$possibleMoveToを返す
        return $possibleMoveTo;
    }

    //仮引数として$row,$colを渡したgetRiskAtメソッドを定義
    public function getRiskAt($row, $col)
    {
        //$targetPieceに$this->getPieceAt($row,$col)を代入する
        $targetPiece = $this->getPieceAt($row, $col);
        //forに初期値$i=-1、繰り返し条件$i<=1、条件を満たした場合の実行式$i++を渡す
        for ($i = -1; $i <= 1; $i++) {
            //forに初期値$j=-1、繰り返し条件$j<=1、条件を満たした場合の実行式$j++を渡す
            for ($j = -1; $j <= 1; $j++) {
                //if条件式にisValidInput($row+$i,$col+$j)を渡す
                if ($this->isValidInput($row + $i, $col + $j)) {
                    //$pieceに$this->getPieceAt($row+$i,$col+$j)を代入する
                    $piece = $this->getPieceAt($row + $i, $col + $j);
                    //if条件式に$piece!=null &&$piece->owner != $targetPiece->ownerを渡す
                    if ($piece != null && $piece->owner != $targetPiece->owner) {
                        //$movesに$this-> getPossibleMoveTo($row+$i,$col+$j)を代入する
                        $moves = $this->getPossibleMoveTo($row + $i, $col + $j);
                        //if条件式にin_array([$row,$col],$moves)を渡す
                        if (in_array([$row, $col], $moves)) {
                            //trueを返す
                            return true;
                        }
                    }
                }
            }
        }

        //falseを返す
        return false;
    }

    //仮引数として$row,$colを渡したprintRiskAtメソッドを定義
    public function printRiskAt($row, $col)
    {
        //$pieceに$this->getPieceAt($row,$col)を代入する
        $piece = $this->getPieceAt($row, $col);
        if ($piece != null) {
            //if条件式に$this->getRiskAt($row,$col)を渡す
            if ($this->getRiskAt($row, $col)) {
                //取られてしまう場合の文章を出力
                echo "[$row,$col]にあるPlayer{$piece->owner}の{$piece->type}は次の手で取られてしまいます。";
            } else {
                //取られない場合の文章を出力
                echo "[$row,$col]にあるPlayer{$piece->owner}の{$piece->type}は次の手では取られません。";
            }
        } else {
            $err = new NoPieceException($row, $col);
            echo $err->getMessage();
        }
    }
}

$board = new Board;
$board->viewBoard();
echo "<br>";
$board->printRiskAt(1,3);
