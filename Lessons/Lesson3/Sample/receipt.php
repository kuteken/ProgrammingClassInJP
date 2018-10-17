<?php
define("TAX_RATE", 10); // Percentage

// 次のステップでは削除する
// $product1 = $argv[2]; // 第2引数
// $product2 = $argv[3]; // 第3引数
// print $product1;
// print $product2;

$product_number = $argc - 2;
for ($i = 2; $i <= $product_number + 1; $i++) {
  $product_name = $argv[$i];
  $shopping_cart[$product_name] = "";
}
var_dump($product_list, $shopping_cart);

$shopping_cart = array_intersect_key($product_list, $shopping_cart)
var_dump($shopping_cart);

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
Tax({$tax_rate}%)          {$tax}
---------------------------
Total             {$total}
===========================
EOT;

print $result;
