<?php
function get_country_greeting($country) {
    $greetings = array (
        'jp' => 'こんにちは！',
        'vn' => 'xin chao',
        'en' => 'Hello',
    );
    $greetings = $greetings[$country];
    return $greetings;
}

function generate_message($greetings,$name){
    $message = "{$greetings}! {$name}";
    return $message;
}

$name = $argv[1];
$country = $argv[2];

$greetings = get_country_greeting($country);
$message = generate_message($greetings,$name);
print $message;
