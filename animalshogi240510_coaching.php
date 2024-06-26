

<?php
//本240507バージョンでの気づき:後からコマを同じ場所に置いたときに上書きできないなということに気づいた Player1側が無敵。。。
//指定した位置にコマがない、、の例外も共通メソッドにできそうだ。。。


class MatsuedaException {
    public function __construct(public $message){
        $this->message = $message;
    }
    public function getMessage(){
        return $this->message;
    }
}

$e = new MatsuedaException('message');
echo $e->getMessage(); // message とechoされる

$e = new MatsuedaException('ほげ');
echo $e->getMessage(); // ほげ　とechoされる

class InvalidPositionException extends MatsuedaException {
    function __construct($row,$col){
        parent::__construct("Invalid position($row,$col)");
    }
}

$e = new InvalidPositionException(-2, -6);
echo $e->getMessage(); // Invalid postion(-2,-6) とechoされる

$e = new InvalidPositionException(200, 200);
echo $e->getMessage(); // Invalid position(200,200)　とechoされる


//Exceptionを継承したIsNotValidInputExceptionを定義
class IsNotValidInputException extends Exception
{
//    public __construct(){
//        "正しい盤内の位置を入力して下さい。"
//    }
}

//Exceptionを継承したIsAlreadyYourPieceAtを定義
class IsAlreadyYourPieceAt extends Exception
{
}


//BoardAndPieceクラスを宣言
class BoardAndPiece
{

    //配列$piecesを宣言
    public static $pieces = [];

    //$row,$colを仮引数として渡したgetPieceAtメソッドを定義：（メモ）$row,$colの位置にあるコマを返す、ない場合はnull
    public static function getPieceAt($row, $col)
    {
        //self::$piecesをforeachの反復可能表現として渡し取り出す値を$piecesとする
        foreach (self::$pieces as $piece) {
            //if条件式に$piece->position['row'] == $row && $piece->position['col'] == $colを渡す
            if ($piece->position['row'] == $row && $piece->position['col'] == $col) {
                //$pieceを返す
                return $piece;
            }
        }
        //nullを返す
        return null;
    }





    //入力された位置が正の整数かつ盤内かをチェックする関数
    public static function isValidInputPosition($row, $col)
    {
        //文字パターン（整数のみ）'/^[1-9][0-9]*$/'を$patternに代入
        $pattern = '/^[1-9][0-9]*$/';
        //if条件式にpreg_match関数にそれぞれ$pattern, $rowと$pattern, $colを引数で渡した返り値、$row,$colが盤面外の数値となる式を全てorでつないで渡す
        if (!preg_match($pattern, $row) or !preg_match($pattern, $col) or $row < 1 or $row > 4 or $col < 1 or $col > 3) {
            //引数にエラー文章を渡したIsNotValidInputExceptionインスタンスをthrowする
            throw new IsNotValidInputException("正しい盤内の位置を入力して下さい。");
        } else {
            //$row,$colを配列に要素として入れたものを返す
            return [$row, $col];
        }
    }




    //仮引数として$owner,$row,$colを渡したsquarePossibleCheckメソッドを定義：（メモ）指定したマスに自駒があるかどうかをチェックする
    public static function squarePossibleCheck($owner, $row, $col)
    {
        //自クラスのgetPieceAtメソッドに仮引数$row,$colを渡した返り値を$pieceCheckに代入する
        $pieceCheck = self::getPieceAt($row, $col);
        //if条件式に$pieceCheck!=null && $owner == $pieceCheck->ownerの条件を渡す
        if ($pieceCheck != null && $owner == $pieceCheck->owner) {
            //引数に自駒重複のエラー文を渡したExceptionインスタンスをスローする
            throw new IsAlreadyYourPieceAt("[$row,$col]には自駒があるため置けません。");
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
            //BoardAndPiece::isValidInputPositionに$row,$colを渡す
            BoardAndPiece::isValidInputPosition($row, $col);
            //BoardAndPiece::squarePossibleCheckに$owner, $row, $colを渡す
            BoardAndPiece::squarePossibleCheck($owner, $row, $col);
            //仮引数$ownerを$this->ownerに代入する
            $this->owner = $owner;
            //$checkPosition配列の0番目の要素をを$this->position['row']に代入する
            $this->position['row'] = $row;
            //$checkPosition配列の1番目の要素をを$this->position['col']に代入する
            $this->position['col'] = $col;
            //仮引数$typeを$this->typeに代入する
            $this->type = $type;
            //エラー型IsNotValidInputExceptionをcatchに渡す
        } catch (IsNotValidInputException $e) {
            //$e->getMessageを$puterrに代入
            $puterr = $e->getMessage();
            //exit関数に$puterrを渡す
            exit($puterr);
            //エラー型IsAlreadyYourPieceAtをcatchに渡す
        } catch (IsAlreadyYourPieceAt $e) {
            //$e->getMessageを$errに代入
            $err = $e->getMessage();
            //exit関数に$errを渡す
            exit($err);
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

            try {
                //BoardAndPiece::isValidInputPositionに$newRow,$newColを渡す
                BoardAndPiece::isValidInputPosition($newRow, $newCol);
                //['row' => $newRow, 'col' => $newCol]を$moves[]に要素として渡す
                $moves[] = ['row' => $newRow, 'col' => $newCol];
                //(念の為確認：catch書かないとエラーになりました。。)
            } catch (IsNotValidInputException $e) {
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
        //BoardAndPiece::$pieces配列にowner,row,col,typeの順で渡したPieceインスタンスを要素として渡す
        BoardAndPiece::$pieces[] = new Piece(1, 1, 1, "Giraffe");
        BoardAndPiece::$pieces[] = new Piece(1, 1, 2, "Lion");
        BoardAndPiece::$pieces[] = new Piece(1, 1, 3, "Elephant");
        BoardAndPiece::$pieces[] = new Piece(1, 2, 2, "Chick");
        BoardAndPiece::$pieces[] = new Piece(2, 3, 2, "Chick");
        BoardAndPiece::$pieces[] = new Piece(2, 4, 1, "Elephant");
        BoardAndPiece::$pieces[] = new Piece(2, 4, 2, "Lion");
        BoardAndPiece::$pieces[] = new Piece(2, 4, 3, "Giraffe");
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
        //BoardAndPiece::isValidInputPositionのエラーを受け取らせる
        try {
            $checkValue = BoardAndPiece::isValidInputPosition($i, $j);
            //$pieceにBoardAndPiece::getPieceAtに仮引数$i,$jを渡した返り値を代入
            $piece = BoardAndPiece::getPieceAt($i, $j);
            if ($piece != null) {
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
                }
                //    }
                //faleseを返す
                return false;
            } else {
                echo "[$i,$j]にはコマがありません。<br>";
            }
            //エラー型Exceptionを渡す
        } catch (IsNotValidInputException $e) {
            //$e->getMessage()を$outOfBoardErrorに代入する
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
$board->movePiece(3, 2, 2, 2);
$board->movePiece(4, 2, 3, 3);
$board->movePiece(3, 3, 3, 4);
$board->viewBoard();

echo $board->echoRisk(3, 2);
echo $board->echoRisk(2, 1);

//初期位置はなおったが、それに伴いgetRiskが想定外。（240504） → getPieceAt内に盤外エラーを設置することで回避（240504）
//


