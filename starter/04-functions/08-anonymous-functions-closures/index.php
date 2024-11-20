<?php 


function createCounter() {
  $count = 0; 

  // anonymous function (use で外部変数を参照できるようになる)
  $counter = function() use(&$count) {
    return ++$count; // 1 ずつ増加
  };

  return $count;
}

$counter = createCounter();

echo $counter(); // 1
echo $counter(); // 2
echo $counter(); // 3