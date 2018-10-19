<?php
// 初期設定
define("TAX_RATE", 10); // Percentage
$product_price_list = [
    'Coca' => 10000,
    'Pepsi' => 10000,
    'Sprite' => 15000,
    'Redbull' => 20000,
];
$receipt_template['header'] = <<<"EOT"
===========================
Receipt
---------------------------
EOT;
$receipt_template['line'] = "---------------------------\n";

$receipt_template['footer'] = "===========================\n";

// 関数
function getBoughtProductsList($argv)
{
    array_shift($argv);
    $bought_products = $argv;
    $bought_products = addPriceToBoughtProducts($bought_products);

    return $bought_products;
}

function addPriceToBoughtProducts($bought_products)
{
    global $product_price_list;
    foreach ($bought_products as $product) {
        $tmp[$product] = NULL;
    }
    $bought_products = array_intersect_key($product_price_list, $tmp);

    return $bought_products;
}

function getReceiptData($bought_products)
{
    // 初期化
    global $receipt_template;
    $subtotal_price = 0;
    $product_receipt = "\n";

    // 小計、レシート商品部分データ生成
    foreach ($bought_products as $name => $price) {
        $subtotal_price += $price;
        $formatted_price = number_format($price);
        $product_receipt .= "{$name}\t\t{$formatted_price}\n";
    }
    $formatted_subtotal_price = number_format($subtotal_price);

    // 消費税計算
    $tax_rate = TAX_RATE;
    $tax_price = $subtotal_price * $tax_rate / 100;
    $formatted_tax_price = number_format($tax_price);

    // 合計計算
    $total_price = $subtotal_price + $tax_price;
    $formatted_total_price = number_format($total_price);

    // レシート整形
    $receipt_text = "";
    $receipt_text .= $receipt_template['header'];
    $receipt_text .= $product_receipt . $receipt_template['line'];
    $receipt_text .= "Subtotal\t{$formatted_subtotal_price}\n";
    $receipt_text .= "Tax({$tax_rate}%)\t{$formatted_tax_price}\n" . $receipt_template['line'];
    $receipt_text .= "Total\t\t{$formatted_total_price}\n";
    $receipt_text .= $receipt_template['footer'];

    return $receipt_text;
}

// メイン処理
$bought_products = getBoughtProductsList($argv);
print getReceiptData($bought_products);