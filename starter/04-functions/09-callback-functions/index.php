<?php 
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// $squaredNumbers = array_map(function($number) {
//     return $number * $number;
// }, $numbers);


$squaredNumbers = array_map(fn($number) => $number * $number, $numbers); // fn() function is a shorthand for anonymous functions (1行の場合のみ使用可能)

// OR

$squaredNumbers = array_map(function($number) {
  return $number * $number;
}, $numbers);

print_r($squaredNumbers); // print_r() function prints human-readable information about a variable

// ==================================

// $callback に関数 $double を渡す
function applyCallback ($callback, $value) {
  return $callback($value);
}

$double = function($number) {
  return $number * 2;
};

$result = applyCallback($double, 5);

echo $result; // 10