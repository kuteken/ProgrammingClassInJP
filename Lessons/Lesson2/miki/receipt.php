<?php
define("TAX_RATE", 10); // Percentage

$product_list = [
    'Coca' => 10000,
    'Pepsi' => 10000,
    'Sprite' => 15000,
    'Redbull' => 20000,
];

// $product1 = $argv[2]; // 第2引数
// $product2 = $argv[3]; // 第3引数
// print $product1;
// print $product2;

$product_number = $argc - 2;
for ($i = 2; $i <= $product_number + 1; $i++) {
    $product_name = $argv[$i];
    $shopping_cart[$product_name] = "";
}
var_dump($product_list, $shopping_cart, array_ingit nitersect_key($product_list, $shopping_cart));

$subtotal = $argv[1];
$tax_rate = TAX_RATE;
$tax      = $subtotal * $tax_rate / 100;
$total    = $subtotal + $tax;

$result = <<<"EOT"
===========================
Receipt
---------------------------
Coca              10.000
Redbull           20.000
---------------------------
Subtotal          {$subtotal}
Tax(10%)          {$tax}
---------------------------
Total             {$total}
===========================
EOT;

print $result;
