<?php
/**
 * 初期設定
 */
define("TAX_RATE", 10); // Percentage
$product_list = [
    'Coca' => 10000,
    'Pepsi' => 10000,
    'Sprite' => 15000,
    'Redbull' => 20000,
];

/**
 * メイン処理
 */
$shopping_cart = getShoppingCart($argc, $argv);
$receipt = getReceipt($shopping_cart);
print $receipt;


/**
 * ショッピングカートの商品情報と価格の紐づけ
 * @param $argc
 * @param $argv
 * @return array $shopping_cart
 */
function getShoppingCart($argc, $argv)
{
    global $product_list;
    $product_number = $argc - 1;

    for ($i = 1; $i <= $product_number; $i++) {
        $product_name = $argv[$i];
        $shopping_cart[$product_name] = "";
    }
    $shopping_cart = array_intersect_key($product_list, $shopping_cart);

    return $shopping_cart;
}

/**
 * レシートの商品部分出力結果作成
 * @param $shopping_cart
 * @return string $product_receipt
 */
function getProductReceipt($shopping_cart)
{
    $product_receipt = "";
    foreach ($shopping_cart as $product => $price) {
        $formatted_price = number_format($price);
        $product_receipt .= "{$product}\t\t{$formatted_price}\n";
    }

    return $product_receipt;
}

/**
 * 商品の小計計算
 * @param $shopping_cart
 * @return int $subtotal
 */
function getSubtotal($shopping_cart)
{
    $subtotal = 0;
    foreach ($shopping_cart as $product => $price) {
        $subtotal += $price;
    }

    return $subtotal;
}

/**
 * TAXの計算
 * @param $subtotal
 * @return int $tax
 */
function getTax($subtotal)
{
    $tax = $subtotal * TAX_RATE / 100;

    return $tax;
}

/**
 * 合計の計算
 * @param $subtotal
 * @param $tax
 * @return int $total
 */
function getTotal($subtotal, $tax)
{
    $total = $subtotal + $tax;

    return $total;
}

/**
 * レシート出力結果の作成
 * @param $shopping_cart
 * @return string $receipt
 */
function getReceipt($shopping_cart)
{
    $product_receipt = getProductReceipt($shopping_cart);

    $subtotal = getSubtotal($shopping_cart);
    $formatted_subtotal = number_format($subtotal);

    $tax_rate = TAX_RATE;
    $tax = getTax($subtotal);
    $formatted_tax = number_format($tax);

    $total = getTotal($subtotal, $tax);
    $formatted_total = number_format($total);

    $receipt = <<<"EOT"
===========================
Receipt
---------------------------
{$product_receipt}
---------------------------
Subtotal\t{$formatted_subtotal}
Tax({$tax_rate}%)\t {$formatted_tax}
---------------------------
Total\t\t{$formatted_total}
===========================

EOT;

    return $receipt;
}
