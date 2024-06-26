<?php
require_once("TaroTool.php");
require_once("HanaTool.php");
// MyClassクラスを定義する
class MyClass {
  // ２つのトレイトを使用する
  use TaroTool, HanaTool {
    TaroTool::hello as taroHello;
    HanaTool::hello as hanaHello;
    HanaTool::hello insteadof TaroTool;
  }
}
// ?>
