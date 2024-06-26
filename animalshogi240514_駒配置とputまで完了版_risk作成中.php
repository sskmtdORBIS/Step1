<?php

class InvalidPositionException extends Exception
{
    public function __construct($row, $col)
    {
        parent::__construct("[$row,$col]は盤面の位置として不適切です。盤面内の位置を入力して下さい。<br>");
    }
}

class DuplicatePositionException extends Exception
{
    public function __construct($row, $col)
    {
        parent::__construct("[$row,$col]には自駒があるため置けません。<br>");
    }
}

class NoPieceThereException extends Exception
{
    public function __construct($row, $col)
    {
        parent::__construct("[$row,$col]には駒がありません。<br>");
    }
}


class Piece
{
    public $position = ['row' => null, 'col' => null];
    public $possibleDirections = [];

    public function __construct(public $owner, $row, $col, public $type)
    {
        $this->owner =  $owner;
        $this->position['row'] = $row;
        $this->position['col'] = $col;
        $this->type = $type;

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

    public function __toString()
    {
        return $this->owner . $this->type[0];
    }
}

class Board
{
    public $PiecesOnBoard = [];
    public function __construct()
    {
        $this->PiecesOnBoard[] = new Piece(1, 1, 1, "Giraffe");
        $this->PiecesOnBoard[] = new Piece(1, 1, 2, "Lion");
        $this->PiecesOnBoard[] = new Piece(1, 1, 3, "Elephant");
        $this->PiecesOnBoard[] = new Piece(1, 2, 2, "Chick");
        $this->PiecesOnBoard[] = new Piece(2, 3, 2, "Chick");
        $this->PiecesOnBoard[] = new Piece(2, 4, 1, "Elephant");
        $this->PiecesOnBoard[] = new Piece(2, 4, 2, "Lion");
        $this->PiecesOnBoard[] = new Piece(2, 4, 3, "Giraffe");
    }

    public function validPositionValue($row, $col)
    {
        $pattern = '/^[1-9][0-9]*$/';
        if (!preg_match($pattern, $row) or !preg_match($pattern, $col) or $row < 1 or $row > 4 or $col < 1 or $col > 3) {
            throw new InvalidPositionException($row, $col);
        } else {
            return [$row, $col];
        }
    }

    public function pieceDuplicateCheck($owner, $row, $col)
    {
        $pieceCheck = $this->getPieceAt($row, $col);
        if ($pieceCheck != null && $pieceCheck->owner == $owner) {
            throw new DuplicatePositionException($row, $col);
        } else {
            return [$owner, $row, $col];
        }
    }

    public function pieceIsNotThereCheck($row, $col)
    {
        $pieceCheck = $this->getPieceAt($row, $col);
        if ($pieceCheck == null) {
            throw new NoPieceThereException($row, $col);
        } else {
            return [$row, $col];
        }
    }


    public function getPieceAt($row, $col)
    {
        foreach ($this->PiecesOnBoard as $piece) {
            if ($piece->position['row'] == $row && $piece->position['col'] == $col) {
                return $piece;
            }
        }
        return null;
    }

    public function getPossibleMoves($row, $col)
    {
        $targetPiece = $this->getPieceAt($row, $col);
        $moves = [];
        if ($targetPiece == null) {
            $moves = [];
        } else {
            foreach ($targetPiece->possibleDirections as $direction) {
                $newRow = $targetPiece->position['row'] + $direction[0];
                $newCol = $targetPiece->position['col'] + $direction[1];
                try {
                    $this->validPositionValue($newRow, $newCol);
                    $moves[] = ['row' => $newRow, 'col' => $newCol];
                } catch (InvalidPositionException $e) {
                }
            }
        }
        return $moves;
    }

    public function putPieceAt($owner, $row, $col,  $nextrow, $nextcol)
    {
        try {
            $this->validPositionValue($row, $col);
            $this->pieceIsNotThereCheck($row, $col);
            $this->validPositionValue($nextrow, $nextcol);

            $targetPiece = $this->getPieceAt($row, $col);
            $nextSquarePiece = $this->getPieceAt($nextrow, $nextcol);
            if ($targetPiece->owner != $owner) {
                echo "相手のコマは動かせません。<br>";
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
                    echo "[$row,$col]の駒は[$nextrow,$nextcol]には動けません。<br>";
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

    public function viewBoard()
    {
        echo "<br>";
        for ($i = 1; $i <= 4; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                $piece = $this->getPieceAt($i, $j);
                if ($piece != null) {
                    echo $piece;
                } else {
                    echo "__";
                }
            }
            echo "<br>";
        }
    }
    
    public function getRisk($row,$col){
        $now = [$row,$col];
        for($i=1;$i<=4;$i++){
            for($j=1;$j<=3;$j++){
                $moves = $this->getPossibleMoves($i,$j);
                if(in_array($now,$moves)){
                    echo "true";
                }
            }
        }
        echo "false";
    }
}

$board = new Board;
$board->viewBoard();
$board->putPieceAt(1,1,1,2,1);
$board->viewBoard();

$board->putPieceAt(2,3,2,2,2);
$board->viewBoard();

$board->putPieceAt(1,1,2,2,1);
$board->viewBoard();

$board->getRisk(1,2);


$check = [1,2];

$array = [[1,1],[1,2],[2,1]];

if(in_array($check,$array)){
    echo "true";
}


