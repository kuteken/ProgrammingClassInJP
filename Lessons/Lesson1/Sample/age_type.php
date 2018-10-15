<?php

// 実行するときは、ターミナルで php age_type.php {age}
// e.g. php age_type.php 12

$age = $argv[1];

if ($age < 20) {
    $type = '子供';
} elseif ($age < 60) {
    $type = '大人';
} elseif ($age < 150) {
    $type = 'お年寄り';
} else {
    $type = 'エラー';
}

if ($type != 'エラー') {
    print "あなたは{$type}です。\n";
} else {
    print "エラーです。正しい年齢を入力してください。\n";
}
