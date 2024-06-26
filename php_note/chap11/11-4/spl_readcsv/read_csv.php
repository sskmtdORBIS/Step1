<?php
require_once("../../lib/util.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>SplFileObjectでCSVファイルを読み込む</title>
<link href="../../css/style.css" rel="stylesheet">
<!-- テーブル用のスタイルシート -->
<link href="../../css/tablestyle.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  $filename = "mydata.csv";
  try {
    // ファイルオブジェクトを作る（rb 読み込みのみ。ファイルの先頭から読み込む）
    $fileObj = new SplFileObject($filename, "rb");
  } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    exit();
  }
  // CSVファイルを読み込む（完全な空行はスキップする）
  $fileObj->setFlags(
    SplFileObject::READ_CSV
    | SplFileObject::READ_AHEAD
    | SplFileObject::SKIP_EMPTY
    | SplFileObject::DROP_NEW_LINE
  );
  // テーブルのタイトル行
  echo "<table>";
  echo "<thead><tr>";
  echo "<th>", "ID", "</th>";
  echo "<th>", "商品名", "</th>";
  echo "<th>", "価格", "</th>";
  echo "</tr></thead>";
  // 値を取り出して行に表示する
  echo "<tbody>";
  foreach ($fileObj as $row){
    // 配列を変数に取り出す
    list($id, $name, $price) = $row;
    // 価格が入っていない場合はスキップする
    if ($price==""){
      continue;
    }
    // １行ずつテーブルに入れる
    echo "<tr>";
    echo "<td>", es($id), "</td>";
    echo "<td>", es($name), "</td>";
    echo "<td>", es(number_format($price)), "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  ?>
</div>
</body>
</html>
