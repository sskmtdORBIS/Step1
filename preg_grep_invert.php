<?PHP
$data = ["R5","E2","E6","A8","R1","G8"];
$pattern = "/[ARE]/";

$result = preg_grep($pattern,$data,PREG_GREP_INVERT);
echo "該当しない".count($result)."件".PHP_EOL;

$resultString = implode(PHP_EOL,$result);
echo $resultString;
?>