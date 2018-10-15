<?php



$fruits = array("banana", "apple", "grape");
print $fruits[0] . "\n";
print $fruits[1] . "\n";
print $fruits[2] . "\n";

for($i=0; $i <= 2; $i++) {
    print $fruits[$i] . "\n";
}


//fruits[$i]

$fruits = array(
    "banana" => 1,
    "apple" => 3,
    "grape" => 5,
    
    );
    
print $fruits['banana'] . "\n";
print $fruits['apple'] . "\n";
print $fruits['grape'] . "\n";

----

<?php

function sum($a, $b) { //khai bao ham
    $sum_result = $a + $b;
    return $sum_result;
}

function sub($a, $b) {
   $sub_result = $a - $b;
    return $sub_result;
}

function times ($a, $b) {
    $times_result = $a * $b;
    return $times_result;
}    
    
$a = $argv[1]; //insert 1st argument
$b = $argv[2]; //insert 2nd argument
$result = sum($a, $b). "\n";
$result = sub($a, $b). "\n" ;
$result = times($a, $b). "\n" ;   //when run the function, insert $result
print $sum_result;
print $sub_result;
print $times_result;

------

<?php

function get_country_greeting($country) {
    $greeting = array(
        'jp' => 'こんにちは',
        "vn" => 'Xin chao',
        'en' => 'hello'
        );
        $greeting = $greeting ["$country"];
        return $greeting;
}

//funtion create message
function generate_message($greeting, $name) {
    var_dump($greeting, $name);
    $message = "{$greeting}! {$name}!\n";
    return $message;

}

$name = $argv[1]; //Na
$country = $argv[2]; //vn
var_dump($name, $country); //debug

$greeting = get_country_greeting($country);
var_dump($greeting);
$message = generate_message($greeting, $name);
print $message;
