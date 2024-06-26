<?php
require_once("TaroTool.php");
require_once("HanaTool.php");

class MyClass {
    use TaroTool,HanaTool{
        TaroTool::hello as taroHello;
        HanaTool::hello as hanaHello;
        TaroTool::hello insteadof HanaTool;
    }
}
//?>