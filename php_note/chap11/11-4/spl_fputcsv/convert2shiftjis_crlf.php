<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ShiftJIS, CRLFファイルに変換する</title>
</head>
<body>
<div>
  <?php
  $filename = "mydata.csv";
  $filename_win = "mydata_win.csv";

 try{
    // ファイルオブジェクトを作る（rb 読み込み専用）
    $fileObj = new SplFileObject($filename, "rb");
    // ファイルオブジェクトを作る（wb 新規書き出し。ファイルがなければ作る）
    $fileObj_win = new SplFileObject($filename_win, "wb");
  } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    exit();
  }

  // ストリングを読み込む
  $readdata = $fileObj->fread($fileObj->getSize());
  // $fileObj = NULL;
  // 改行コードをLFからCRLFにする
  $outdata = str_replace("\n", "\r\n", $readdata);
  // ShiftJISに変換する
  $outdata = mb_convert_encoding($outdata,"SJIS","auto");

  // ダブルクォーテーションで囲む
  $outdata = str_replace(",", '","', $outdata);
  $outdata = str_replace("\r\n", '\"\r\n\"', $outdata);
  // 先頭に追加し、最後の１個を取り除く
  $outdata = '"' . $outdata;
  $outdata = mb_substr($outdata, 0, -1, "SJIS");

  // ファイルに書き込む
  $written = $fileObj_win->fwrite($outdata);
  if ($written===FALSE){
    echo '<span class="error">', "{$filename_win}に保存できませんでした。</span>";
  } else {
    echo "{$filename}をShift-JIS、CRLFに変換した{$filename_win}を書き出しました。";
  }
  ?>
</div>
</body>
</html>
