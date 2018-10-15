<?php

// 実行するときは、ターミナルで php bus_ticket.php {age} {ticket_number}
// e.g. php bus_ticket.php 12 2
$age = $argv[1];
$ticket_number = $argv[2];

if ($age < 20) {
    $type = '子供';
    $ticket_unit_price = 100;
} elseif ($age < 60) {
    $type = '大人';
    $ticket_unit_price = 200;
} elseif ($age < 150) {
    $type = 'お年寄り';
    $ticket_unit_price = 150;
} else {
    $type = 'エラー';
}

$ticket_total_price = $ticket_unit_price * $ticket_number;

if ($type != 'エラー') {
    print "{$type}チケットが、{$ticket_number}枚で、合計{$ticket_total_price}Kドンです\n";
} else {
    print "エラーです。正しい年齢を入力してください。\n";
}
