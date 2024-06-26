<?php
// XSS対策のためのHTMLエスケープ
function es(array|string $data, string $charset='UTF-8'):mixed {
  // $dataが配列のとき
  if (is_array($data)){
    // 再帰呼び出し
    return array_map(__METHOD__, $data);
  } else {
    // HTMLエスケープを行う
    return htmlspecialchars(string:$data, flags:ENT_QUOTES, encoding:$charset);
  }
}
// ?>
