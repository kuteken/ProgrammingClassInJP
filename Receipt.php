<?php

define("TAX_RATE",  10); // Percentage

$product_list = [
    'Coca'    => 10000,
    'Pepsi'   => 10000,
    'Sprite' => 15000,
    'Redbull' => 20000,
];


$sub_total = $argv[1];
$product_name_1 = $argv[2];
$product_name_2 = $argv[3];

$tax_rate = TAX_RATE ;
$tax = $sub_total * TAX_RATE * 0.01;
$total = $sub_total + $tax;
$product_number = $argc - 2;
for ($i = 2; $i <= $product_number +1 ; $i++) {
  $product_name = $argv[$i]; 
  $shopping_cart[$product_name] = "";
}
var_dump($product_list, $shopping_cart, array_intersect_key($product_list, $shopping_cart)); 

$text = "Receipt
---------------------------
$product_name_1              10.000
$product_name_2           20.000
---------------------------
Quantity          $product_number
Subtotal          $sub_total
Tax($tax_rate%)          $tax
---------------------------
Total             $total";

print "$text";
