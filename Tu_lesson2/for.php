<?php

$fruits = array("banana", "apple","grape");
for ($i=0; $i <= 2; $i++){
    print $fruits[$i] . "\n";
}

$fruits = array(
    "banana" => 1,
    "apple" => 3,
    "grape" => 5
    );
print $fruits['banana'] . "\n";
print $fruits['apple'] . "\n";
print $fruits['grape'] . "\n";
