<?php

function sum ($a,$b){
    $result = $a + $b;
    return $result;
}
function sub($a,$b){
    $result = $b - $a;
    return $result;
}
function times($a,$b){
    $result = $a * $b;
    return $result;
}
$a = $argv[1];
$b = $argv[2];
$sum_result = sum($a,$b);
$sub_result = sub($a,$b);
$times_result = times($a,$b);
print "SUM : ". $sum_result ."\n";
print "SUB : ". $sub_result ."\n";
print "TIMES : ". $times_result ."\n";
