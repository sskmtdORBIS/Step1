<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>SplFileObjectでCSVファイルに書き込む</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  $filename = "mydata.csv";
  // CSVのヘッダ行
  $csv_header = ["id", "名前", "年齢", "趣味"];
  // CSVのデータ
  $csv_data = [];
  $csv_data[] = ["a10", "高橋久美", "36", "沢登り"];
  $csv_data[] = ["a11", "手塚雄一", "31", "トレラン"];
  $csv_data[] = ["a12", "戸高栄里", "18", "料理"];
  $csv_data[] = ["a13", "迫田信治", "23", "ボルダリング"];
  $csv_data[] = ["a14", "山岡南美", "26", "サーフィン"];

  try {
    // ファイルオブジェクトを作る（wb 新規書き出し。ファイルがなければ作る）
    $fileObj = new SplFileObject($filename, "wb");
  } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    exit();
  }
  // ヘッダ行をCSVに書き出す
  $fileObj->fputcsv($csv_header);
  // データをCSVに追加する
  foreach ($csv_data as $value) {
    $fileObj->fputcsv($value);
  }
  echo "{$filename}の書き出しが終わりました。";
  ?>
</div>
</body>
</html>
