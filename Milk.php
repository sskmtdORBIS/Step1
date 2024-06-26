<?php
require_once("DateTool.php");

class Milk{
    use DateTool;
    public String $theDate;
    public String $limitDate;

    function __construct(){
        $now = new DateTime();

        $this->theDate = $this->ymdString($now);
        $this->limitDate = $this->addYmdString($now,10);
    }
}

//?>

