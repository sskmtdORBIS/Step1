<?php
//Exceptionクラスを継承したInvalidPositionExceptionを定義　（メモ：盤面の位置として不適切な入力があった場合の例外）
class InvalidPositionException extends Exception
{
    //$row,$colを引数として渡したコンストラクタを定義
    public function __construct($row, $col)
    {
        //Exceptionクラスのコンストラクタをオーバーライドして例外メッセージを引数として渡す
        parent::__construct("[$row,$col]は盤面の位置として不適切です。盤面内の位置を入力して下さい。<br><br>");
    }
}

//Exceptionクラスを継承したDuplicatePositionExceptionを定義　（メモ：自駒の重複がある場合の例外）
class DuplicatePositionException extends Exception
{
    //$row,$colを引数として渡したコンストラクタを定義
    public function __construct($row, $col)
    {
        //Exceptionクラスのコンストラクタをオーバーライドして例外メッセージを引数として渡す
        parent::__construct("[$row,$col]には自駒があるため置けません。<br><br>");
    }
}

//Exceptionクラスを継承したNoPieceThereExceptionを定義　（メモ：指定の位置に駒がない場合の例外）
class NoPieceThereException extends Exception
{
    //$row,$colを引数として渡したコンストラクタを定義
    public function __construct($row, $col)
    {
        //Exceptionクラスのコンストラクタをオーバーライドして例外メッセージを引数として渡す
        parent::__construct("[$row,$col]には駒がありません。<br><br>");
    }
}

//Pieceクラスを定義
class Piece
{
    //positionプロパティを定義
    public $position = ['row' => null, 'col' => null];
    //possibleDirections配列を定義
    public $possibleDirections = [];

    //$owner,$row,$col,$type(ownerとtypeはプロパティ宣言を兼ねる)を仮引数として渡したコンストラクタを定義
    public function __construct(public $owner, $row, $col, public $type)
    {
        //$this->ownerに$ownerを代入する
        $this->owner =  $owner;
        //$this->position['row']に要素として$rowを渡す
        $this->position['row'] = $row;
        //$this->position['col']に要素として$colを渡す
        $this->position['col'] = $col;
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
    //PiecesOnBoard配列プロパティを定義
    public $PiecesOnBoard = [];
    //コンストラクタを定義
    public function __construct()
    {
        //PieceOnBoardに要素としてPieceインスタンスを渡す（メモ：ここでは初期位置を入力する）
        $this->PiecesOnBoard[] = new Piece(1, 1, 1, "Giraffe");
        $this->PiecesOnBoard[] = new Piece(1, 1, 2, "Lion");
        $this->PiecesOnBoard[] = new Piece(1, 1, 3, "Elephant");
        $this->PiecesOnBoard[] = new Piece(1, 2, 2, "Chick");
        $this->PiecesOnBoard[] = new Piece(2, 3, 2, "Chick");
        $this->PiecesOnBoard[] = new Piece(2, 4, 1, "Elephant");
        $this->PiecesOnBoard[] = new Piece(2, 4, 2, "Lion");
        $this->PiecesOnBoard[] = new Piece(2, 4, 3, "Giraffe");
    }

    //仮引数として$row,$colを渡したvalidPositionValueメソッドを定義（メモ：入力値が盤面上の値として適切でない場合に例外をthrowする）
    public function validPositionValue($row, $col)
    {
        //'/^[1-9][0-9]*$/'を$patternに代入
        $pattern = '/^[1-9][0-9]*$/';
        //if条件式に!preg_match($pattern, $row) or !preg_match($pattern, $col) or $row < 1 or $row > 4 or $col < 1 or $col > 3を渡す
        //(メモ：正の整数かつ盤面の範囲内であるという条件から逸脱している条件)
        if (!preg_match($pattern, $row) or !preg_match($pattern, $col) or $row < 1 or $row > 4 or $col < 1 or $col > 3) {
            //$row,$colを引数として渡したInvalidPositionExceptionインスタンスをthrowする
            throw new InvalidPositionException($row, $col);
        } else {
            //これ要らないかも。。。
            return [$row, $col];
        }
    }

    //仮引数として$owner,$row,$colを渡したpieceDuplicateCheckメソッドを定義（メモ：入力位置に自駒が存在している場合に例外をthrowする）
    public function pieceDuplicateCheck($owner, $row, $col)
    {
        //$this->getPieceAtメソッドに$row,$colを引数として渡した返り値を$pieeCheckに代入
        $pieceCheck = $this->getPieceAt($row, $col);
        //if条件式に$pieceCheck != null && $pieceCheck->owner == $ownerを渡す
        //（メモ：指定位置がnullではなく指定位置にあるコマと引数として渡す$ownerが一致している条件）
        if ($pieceCheck != null && $pieceCheck->owner == $owner) {
            //$row,$colを引数として渡したDuplicatePositionExceptionインスタンスをthrowする
            throw new DuplicatePositionException($row, $col);
        } else {
            return [$owner, $row, $col];
        }
    }

    //仮引数として$row,$colを渡したpieceIsNotThereCheckメソッドを定義（メモ：指定した位置に駒がない場合に例外をthrowする）
    public function pieceIsNotThereCheck($row, $col)
    {
        //$this->getPieceAtメソッドに$row,$colを渡した返り値を$pieceCheckに代入
        $pieceCheck = $this->getPieceAt($row, $col);
        //if条件式に$pieceCheck == nullを渡す
        if ($pieceCheck == null) {
            //$row,$colを引数として渡したNoPieceThereExceptionインスタンスをthrowする
            throw new NoPieceThereException($row, $col);
        } else {
            return [$row, $col];
        }
    }


    //仮引数として$row,$colを渡したgetPieceAtメソッドを定義
    public function getPieceAt($row, $col)
    {
        //forechに反復対象として$this->PiecesOnBoardを渡し取り出す要素を$pieceとする
        foreach ($this->PiecesOnBoard as $piece) {
            //if条件式に$piece->position['row'] == $row && $piece->position['col'] == $colを渡す
            //(メモ：要素 のrow,colが引数として渡された＄row,colと一致する条件)
            if ($piece->position['row'] == $row && $piece->position['col'] == $col) {
                //$pieceを返す
                return $piece;
            }
        }
        //nullを返す
        return null;
    }

    //仮引数として$row,$colを渡したgetPossibleMovesメソッドを定義
    public function getPossibleMoves($row, $col)
    {
        //$this->getPieceAtメソッドに$row,$colを渡した返り値を$targetPieceに代入する
        $targetPiece = $this->getPieceAt($row, $col);
        //空配列$movesを定義
        $moves = [];
        //if条件式に$targetPiece == nullを渡す
        if ($targetPiece == null) {
            //これ要らないか。。。
            $moves = [];
        } else {
            //foreachに反復対象として$targetPiece->possibleDirectionsを渡し取り出す要素を$directionとする
            //（メモ：$directionはPieceクラスで持っているpossibleDirections配列の要素として持っている移動可能な位置の配列）
            foreach ($targetPiece->possibleDirections as $direction) {
                //$targetPiece->position['row'] + $direction[0]を$newRowに代入する
                $newRow = $targetPiece->position['row'] + $direction[0];
                //$targetPiece->position['col'] + $direction[1]を$newRowに代入する
                $newCol = $targetPiece->position['col'] + $direction[1];
                //try-catch構文
                try {
                    //$this->validPositionValueメソッドに$newRow,$newColを引数として渡す（メモ：例外判定）
                    $this->validPositionValue($newRow, $newCol);
                    //$moves配列のrowキーに$newRowを渡し、colキーに$newColを渡す
                    $moves[] = ['row' => $newRow, 'col' => $newCol];
                //InvalidPositionExceptionをキャッチする
                } catch (InvalidPositionException $e) {
                }
            }
        }
        //$movesを返す
        return $moves;
    }

    //このメソッドは課題外　コマを動かすメソッドを定義してみた
    //相手のコマを取ると手駒position[0,0]としてコマを取る仕様にしたが、もっと進めると手駒をputPieceできるようにするには例外処理の見直しが必要
    public function putPieceAt($owner, $row, $col,  $nextrow, $nextcol)
    {
        try {
            $this->validPositionValue($row, $col);
            $this->pieceIsNotThereCheck($row, $col);
            $this->validPositionValue($nextrow, $nextcol);

            $targetPiece = $this->getPieceAt($row, $col);
            $nextSquarePiece = $this->getPieceAt($nextrow, $nextcol);
            if ($targetPiece->owner != $owner) {
                echo "相手のコマは動かせません。<br><br>";
            } else {

                $moveto = ['row' => $nextrow, 'col' => $nextcol];
                $possiblemoves = $this->getPossibleMoves($row, $col);
                if (in_array($moveto, $possiblemoves)) {
                    $this->pieceDuplicateCheck($owner, $nextrow, $nextcol);
                    $targetPiece->position['row'] = $nextrow;
                    $targetPiece->position['col'] = $nextcol;
                    if ($nextSquarePiece != null) {
                        $nextSquarePiece->position['row'] = 0;
                        $nextSquarePiece->position['col'] = 0;
                        $nextSquarePiece->owner = ($nextSquarePiece->owner == 1) ? 2 : 1;
                    }
                } else {
                    echo "[$row,$col]の駒は[$nextrow,$nextcol]には動けません。<br><br>";
                }
            }
        } catch (InvalidPositionException $e) {
            echo $e->getMessage();
        } catch (DuplicatePositionException $e) {
            echo $e->getMessage();
        } catch (NoPieceThereException $e) {
            echo $e->getMessage();
        }
    }

    //viewBoardメソッドを定義
    public function viewBoard()
    {
        //for文に初期値$i=1,繰り返し条件$i<=4,条件を満たした場合の実行式$i++を渡す
        for ($i = 1; $i <= 4; $i++) {
            //for文に初期値$j=1,繰り返し条件$j<=3,条件を満たした場合の実行式$j++を渡す
            for ($j = 1; $j <= 3; $j++) {
                //$this->getPieceAtメソッドに$i,$jを渡した返り値を$pieceに代入する
                $piece = $this->getPieceAt($i, $j);
                //if条件式に$piece != nullを渡す
                if ($piece != null) {
                    //$pieceを出力する
                    echo $piece;
                } else {
                    //__を出力する
                    echo "__";
                }
            }
            echo "<br>";
        }
        echo "<br>";
    }

    //仮引数として$row、$colを渡したgetRiskメソッドを定義
    public function getRisk($row, $col)
    {
        //$this->getPieceAtメソッドに$row,$colを渡した返り値を$checkPieceに代入する
        $checkPiece = $this->getPieceAt($row, $col);
        //for文に初期値$i=1,繰り返し条件$i<=4,条件を満たした場合の実行式$i++を渡す
        for ($i = 1; $i <= 4; $i++) {
            //for文に初期値$j=1,繰り返し条件$j<=3,条件を満たした場合の実行式$j++を渡す
            for ($j = 1; $j <= 3; $j++) {
                //$this->getPieceAtメソッドに$i,$jを渡した返り値を$enemyに代入する
                $enemy = $this->getPieceAt($i, $j);
                //$this->getPossibleMovesメソッドに$i,$jを渡した返り値を$movesに代入する
                $moves = $this->getPossibleMoves($i, $j);
                //if条件文にin_array($checkPiece->position, $moves) && $checkPiece->owner != $enemy->ownerを渡す
                //（メモ：チェクしたいコマの位置が周りのコマの動ける位置と重複していてコマのオーナーが自分ではない条件）
                if (in_array($checkPiece->position, $moves) && $checkPiece->owner != $enemy->owner) {
                    //trueを返す
                    return true;
                }
            }
        }
        //falseを返す
        return false;
    }

    //仮引数として＄row,$colを渡したprintRiskメソッドを定義
    public function printRisk($row, $col)
    {
        //try-catch構文
        try {
            //$this->validPositionValueメソッドに$row,$colを渡す（メモ：例外チェック）
            $this->validPositionValue($row, $col);
            //$this->pieceIsNotThereCheckメソッドに$row,$colを渡す（メモ：例外チェック）
            $this->pieceIsNotThereCheck($row, $col);

            //$this->getRiskメソッドに$row,$colを渡した返り値を$judghに代入
            $judge = $this->getRisk($row, $col);
            //$this->getPieceAtメソッドに$row,$colを渡した返り値を$pieceに代入
            $piece = $this->getPieceAt($row, $col);
            //if条件式に$judgeを渡す
            if ($judge) {
                //取られる場合の結果文を出力する
                echo "[$row,$col]にある'Player.{$piece->owner}の{$piece->type}'は次の手で取られます。<br><br>";
            } else {
                //取られない場合の結果文を出力する
                echo "[$row,$col]にある'Player.{$piece->owner}の{$piece->type}'は次の手では取られません。<br><br>";
            }
        //InvalidPositionException例外をcatchさせる
        } catch (InvalidPositionException $e) {
            //getMessageの結果を出力する
            echo $e->getMessage();
        //NoPieceThereException例外をcatchさせる
        } catch (NoPieceThereException $e) {
            //getMessageの結果を出力する
            echo $e->getMessage();
        }
    }
}

$board = new Board;
$board->putPieceAt(1, 1, 1, 2, 1);
$board->viewBoard();


$board->printRisk(2,1);
$board->printRisk(3, 2);
