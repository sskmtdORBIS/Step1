<?php

//$pieces[]（今盤にあるコマの配列）をstaticとして持つためにBoardAndPieceクラスを設定（240503)
//BoardAndPieceクラスに行・列を指定したマスのコマを調べるgetPieceAtメソッドを定義（240503)
//同時にそのマスに置くことができるのかをチェックするメソッドをsquarePossibleCheckとして定義（240503)


class IsNotValidInputException extends Exception
{
}

class IsAlreadyYourPieceAt extends Exception{

}

class PieceNotFoundException extends Exception
{
}

//BoardAndPieceクラスを宣言
class BoardAndPiece
{

    //入力された位置が正の整数かつ盤内かをチェックする関数
    public static function isValidInputPosition($row, $col)
    {
        $pattern = '/^[1-9][0-9]*$/';
        if (!preg_match($pattern, $row) or !preg_match($pattern, $col) or $row < 1 or $row > 4 or $col < 1 or $col > 3) {
            throw new IsNotValidInputException("正しい盤内の位置を入力して下さい。");
        } else {
            return [$row, $col];
        }
    }


    //配列$piecesを宣言
    public static $pieces = [];

    //入力された位置にコマがあるかないかを判定する関数
    public static function isPieceAt($row, $col)
    {
        foreach (self::$pieces as $piece) {
            if ($piece->position['row'] == $row && $piece->position['col'] == $col) {
                return true;
            }
        }
        return false;
    }



    //仮引数として$row,$colを渡したgetPieceAtメソッドを定義
    public static function getPieceAt($row, $col)
    {
        try{
            $input = self::isValidInputPosition($row, $col);
            foreach (self::$pieces as $piece) {
                //if条件式に$piecesの要素$pieceに代入されるPieceクラスのインスタンスのpsitionプロパティの行列がそれぞれgetPieceAtに渡される仮引数$row,$colと一致する条件を渡す
                //【相談】↑ここ、Pieceクラスの話が後から出てくるので説明先にしていいのか悩みます
                if ($piece->position['row'] == $input[0] && $piece->position['col'] == $input[1]) {
                    //$pieceを返す
                    return $piece;
                }
            }
        } catch(IsNotValidInputException $e) {
            throw new IsNotValidInputException("盤内のマスを指定して下さい。<br>");
        }
        



        /*
        //if条件式に$row,$colが盤外に出る条件を渡す
        if ($row < 1 or $row > 4 or $col < 1 or $col > 3) {
            //引数に盤外エラー文を渡したExceptionインスタンスをスローする
            throw new OutOfBoardException("[$row,$col]は盤外です。盤内の位置を入力して下さい。<br>");
        } else {
            //自クラスプロパティ$piecesをforeachの反復可能表現として渡し取り出す値を$pieceとする
            foreach (self::$pieces as $piece) {
                //if条件式に$piecesの要素$pieceに代入されるPieceクラスのインスタンスのpsitionプロパティの行列がそれぞれgetPieceAtに渡される仮引数$row,$colと一致する条件を渡す
                //【相談】↑ここ、Pieceクラスの話が後から出てくるので説明先にしていいのか悩みます
                if ($piece->position['row'] == $row && $piece->position['col'] == $col) {
                    //$pieceを返す
                    return $piece;
                }
            }
        }
        throw new PieceNotFoundException("[$row,$col]にはコマがありません。<br>");
*/
    }

    //仮引数として$owner,$row,$colを渡したsquarePossibleCheckメソッドを定義：（メモ）指定したマスに自駒があるかどうかをチェックする
    public static function squarePossibleCheck($owner, $row, $col)
    {
        //自クラスのgetPieceAtメソッドに仮引数$row,$colを渡した返り値を$pieceCheckに代入する
        $pieceCheck = self::getPieceAt($row, $col);
        //if条件式に$pieceCheck!=null && $owner == $pieceCheck->ownerの条件を渡す
        if ($pieceCheck != null && $owner == $pieceCheck->owner) {
            //引数に自駒重複のエラー文を渡したExceptionインスタンスをスローする
            throw new Exception("[$row,$col]には自駒があるため置けません。");
        } else {
            //引数$row,$colを要素として渡した配列を返す
            return [$row, $col];
        }
    }
}






//Pieceクラスを宣言
class Piece
{
    //プロパティ$possibleDirectionsを宣言
    public $possibleDirections = [];
    //プロパティ$positionを宣言
    public $position = ['row' => null, 'col' => null];
    //$owner,$row,$col,$typeを仮引数として渡したコンストラクタを定義
    public function __construct(public $owner, $row, $col, public $type)
    {
        //同一クラス内のputPieceAtメソッドに$owner,$row,$col,$typeを渡す
        $this->putPieceAt($owner, $row, $col, $type);
        //switchの条件式に$this->typeを渡す
        switch ($this->type) {
                // case値ごとに$this->possibleDirectionsにtypeごとの動ける方向を座標の組み合わせの配列として代入する
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

    //$owner,$row,$col,$typeを仮引数として渡したputPieceAtメソッドを定義
    public function putPieceAt($owner, $row, $col, $type)
    {
        //BoardAndPiece::squarePossibleCheckの例外処理を作る
        try {
            //BoardAndPiece::squarePossibleCheckに仮引数$owner,$row,$colを渡した返り値を$checkPositionに代入する
            $checkPosition = BoardAndPiece::squarePossibleCheck($owner, $row, $col);
            //仮引数$ownerを$this->ownerに代入する
            $this->owner = $owner;
            //$checkPosition配列の0番目の要素をを$this->position['row']に代入する
            $this->position['row'] = $checkPosition[0];
            //$checkPosition配列の1番目の要素をを$this->position['col']に代入する
            $this->position['col'] = $checkPosition[1];
            //仮引数$typeを$this->typeに代入する
            $this->type = $type;
        //エラー型Exceptionをcatchに渡す
        } catch (IsNotValidInputException $e) {
            //ExceptionのgetMessageを$puterrに代入
            $puterr = $e->getMessage();
            //exit関数に$puterrを渡す
            exit($puterr);
        }
    }

    //マジックメソッド__toStringを定義
    public function __toString()
    {
        //$this->owner.$this->type[0]を返す
        return $this->owner . $this->type[0];
    }

    //getPossibleMovesメソッドを定義
    public function getPossibleMoves()
    {
        //空配列を$movesに代入　（メモ：$movesはPieceが今いるマスから移動できるマスを二次元配列で保持）
        $moves = [];

        //$this->possibleDirectionsをforeachの反復可能表現として渡し取り出す値を$directionとする
        foreach ($this->possibleDirections as $direction) {
            //$this->position['row']に$direction[0]を足した値を$newRowに代入する
            $newRow = $this->position['row'] + $direction[0];
            //$this->position['col']に$direction[1]を足した値を$newColに代入する
            $newCol = $this->position['col'] + $direction[1];
            //$newRow,$newColが盤内のマス目である条件式をif文に渡す
            if ($newRow >= 1 && $newRow <= 4 && $newCol >= 1 && $newCol <= 3) {
                //$newRow,$newColをそれぞれキーrow,colの要素として渡した配列を$moves[]の次の要素として渡す
                $moves[] = ['row' => $newRow, 'col' => $newCol];
            }
        }
        //$movesを返す
        return $moves;
    }
}


//Boardクラスを宣言する
class Board
{
    //コンストラクタを定義する
    function __construct()
    {
        //BoardAndPieceクラスの例外処理1.squarePossibleCheck,2.getPieceAtの二つの例外を受け取らせる
        try {
            //BoardAndPiece::$piecesにコマの初期位置をそれぞれowner,row,col,typeの順で渡したインスタンスを要素として渡す
            BoardAndPiece::$pieces[] = new Piece(1, 1, 1, "Giraffe");
            BoardAndPiece::$pieces[] = new Piece(1, 1, 2, "Lion");
            BoardAndPiece::$pieces[] = new Piece(1, 1, 3, "Elephant");
            BoardAndPiece::$pieces[] = new Piece(1, 2, 2, "Chick");
            BoardAndPiece::$pieces[] = new Piece(2, 3, 2, "Chick");
            BoardAndPiece::$pieces[] = new Piece(2, 4, 1, "Elephant");
            BoardAndPiece::$pieces[] = new Piece(2, 4, 2, "Lion");
            BoardAndPiece::$pieces[] = new Piece(2, 4, 3, "Giraffe");
        } catch (Exception $e) {
            //例外の場合は$errに$e->getMessage();を代入する
            $err = $e->getMessage();
            //extit関数に$errを渡す
            exit($err);
        }
    }


    //viewBoardメソッドを定義
    public function viewBoard()
    {
        //for文に初期値$i=1,繰り返し条件$i<=4,条件を満たした場合の実行式$i++を渡す
        for ($i = 1; $i <= 4; $i++) {
            //for文に初期値$j=1,繰り返し条件$j<=3,条件を満たした場合の実行式$j++を渡す
            for ($j = 1; $j <= 3; $j++) {
                //BoardAndPiece::getPieceAt($i, $j)を$pieceに代入する
                $piece = BoardAndPiece::getPieceAt($i, $j);
                //if条件式に$piece != nullを渡す
                if ($piece != null) {
                    //$pieceインスタンスをストリングにキャストする
                    echo $piece . " ";
                } else {
                    //"__" をストリングにキャストする
                    echo "__" . " ";
                }
            }
            //<br>をキャストする
            echo "<br>";
        }
    }

    //仮引数$i,$jを渡したgetRiskメソッドを定義する
    //getRiskはboolを返す仕様に変更(0502宿題)
    public function getRisk($i, $j)
    {
        //BoardAndPiece::getPieceAtのエラーを受け取らせる
        try {
            //$pieceにBoardAndPiece::getPieceAtに仮引数$i,$jを渡した返り値を代入
            $piece = BoardAndPiece::getPieceAt($i, $j);
            //if条件式に$piece==nullを渡す
            /*            if ($piece == null) {
                //指定箇所にコマがない文章をキャストする
                echo "[$i,$j]にはコマがありません。<br>";
            } else { */
            //BoardAndPiece::$piecesをforeachの反復可能表現として渡し取り出す値を$othersとする
            foreach (BoardAndPiece::$pieces as $others) {
                //if条件式に$piece->owner !== $others->ownerを渡す
                if ($piece->owner !== $others->owner) {
                    //$others->getPossibleMoves()を$possibleMovesに代入する
                    $possibleMoves = $others->getPossibleMoves();
                    //$possibleMovesをforeachの反復可能表現として渡し取り出す値を$moveとする
                    foreach ($possibleMoves as $move) {
                        //if条件式に$piece->position['row'] === $move['row'] && $piece->position['col'] === $move['col']を渡す　（Pieceがいる位置が周りのコマの移動可能位置である）
                        if ($piece->position['row'] === $move['row'] && $piece->position['col'] === $move['col']) {
                            //trueを返す
                            return true;
                        }
                    }
                }
                //    }
                //faleseを返す
                return false;
            }
            //エラー型Exceptionを渡す
        } catch (IsNotValidInputException $e) {
            //$e->getMessage()を$outOfBoardErrorに代入する
            echo $e->getMessage();
        } catch (PieceNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    //リスクをechoする関数を独立(0502)宿題
    public function echoRisk($i, $j)
    {
        //$this->getRisk($i, $j)を$riskCheckPieceに代入する
        $riskCheckedPiece = $this->getRisk($i, $j);
        //if条件式に$riskCheckedPiece === trueを渡す
        if ($riskCheckedPiece === true) {
            //取られる文面をキャストする
            echo "次の一手で取られます。<br>";
            //else if条件式に$riskCheckedPiece === falseを渡す
        } else if ($riskCheckedPiece === false) {
            //取られない文面をキャストする
            echo "次の一手では取られません。<br>";
            //else if条件式に$riskCheckedPiece === nullを渡す
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

$board->viewBoard();

echo $board->echoRisk(2,1);
echo $board->echoRisk(2, 2);


//初期位置はなおったが、それに伴いgetRiskが想定外。（240504） → getPieceAt内に盤外エラーを設置することで回避（240504）
//