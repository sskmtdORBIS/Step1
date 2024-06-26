<?php
require_once("WorldRule.php");

class MyClass implements WorldRule {

  // WorldRuleインターフェースで指定されているメソッド
  public function hello(){
    echo "こんにちは！", "\n";
  }
  // MyClass独自のメソッド
  public function thanks(){
    echo "ありがとう", "\n";
  }
}
// ?>
