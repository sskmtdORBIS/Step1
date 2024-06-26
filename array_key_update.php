<?php

$goods = [
    'id' => 'R56',
    'size' => 'M',
    'price' => '2340'
];

$goods['price'] = 3500;
$price = number_format($goods['price']);
echo "価格". "{$price}"."円";

?>
