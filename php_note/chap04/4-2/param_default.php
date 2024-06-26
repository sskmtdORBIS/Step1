<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ユーザ定義関数を使って計算する</title>
</head>
<body>
<?php
function charge($rank, $days=1) {
  switch ($rank){
    case "A":
      $ryoukin = 15000 * $days;
      break;
    case "B":
      $ryoukin = 12000 * $days;
      break;
    default:
      $ryoukin = 8000 * $days;
      break;
  }
  return $ryoukin;
}
?>

<?php
// Bランクで２泊の場合とAランクで宿泊数を省略した場合
$kingaku1 = charge("B", 2);
$kingaku2 = charge("A");
echo "金額1は{$kingaku1}円" . "<br>" . PHP_EOL;
echo "金額2は{$kingaku2}円";
?>
</body>
</html>
