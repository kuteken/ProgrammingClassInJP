<?php
define("TAX_RATE", 10); // Percentage

$product_list = [
    'Coca'    => 10000,
    'Pepsi'   => 10000,
    'Sprite'  => 15000,
    'Redbull' => 20000,
];

// 商品リスト
$filename = array_shift($argv);
$shopping_cart = $argv;
foreach ($shopping_cart as $product) {
    $bought_products[$product] = NULL;
}
$bought_products = array_intersect_key($product_list, $bought_products);

// 小計計算
$subtotal = 0;
$product_receipt = "";
foreach ($bought_products as $name => $price) {
    $subtotal += $price;
    $product_receipt .= "{$name}\t\t{$price}\n";
}

// 消費税計算
$tax_rate = TAX_RATE;
$tax = $subtotal * $tax_rate / 100;

// 合計計算
$total = $subtotal + $tax;

// レシート作成
$result = <<<"EOT"
===========================
Receipt
---------------------------
{$product_receipt}---------------------------
Subtotal\t{$subtotal}
Tax(10%)\t{$tax}
---------------------------
Total\t\t{$total}
===========================

EOT;

print $result;
