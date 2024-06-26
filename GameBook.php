<?php
interface GameBook{
    function newGame(int $point);
    function play();
    function isAlive():bool;
}

// ?>