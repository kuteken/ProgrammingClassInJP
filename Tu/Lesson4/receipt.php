<?php
define ("TAX_RATE",10); // percentage

$product_number = $argc - 1;
for ($i = 1; $i <= $product_number; $i++) {
  $product_name = $argv[$i];
  $shopping_cart[$product_name] ="";
}

$product_list = array(
    'Coca'    => 10000,
    'Pepsi'   => 10000,
    'Sprite' => 15000,
    'Redbull' => 20000,
);


$shopping_cart = array_intersect_key($product_list, $shopping_cart);

$product_receipt ="";
$subtotal = 0;
foreach($shopping_cart as $product_name => $price){
     $product_receipt .= "{$product_name}\t{$price}\n"; 
     $subtotal += $price; 
}

$tax_rate = TAX_RATE;
$tax      = $subtotal * $tax_rate / 100;
$total    = $subtotal + $tax;

$result = <<<"EOT"
===========================
Receipt
---------------------------
{$product_receipt}
---------------------------
Subtotal\t{$subtotal}
Tax({$tax_rate}%)\t{$tax}
---------------------------
Total\t{$total}
===========================
EOT;

print $result;
