<?php 

class MathUtility {
  public static $pi = 3.14;

  public static function add(...$nums) {
    return array_sum($nums);
  }
}

$mathUil1 = new MathUtility();
echo $mathUtil1->pi; // non-static property pi cannot be accessed statically

echo MathUtility::$pi; // 3.14 (staticにアクセスするためにはクラス名::プロパティ名でアクセスする)

// method call
echo MathUtility::add(1,2,3,4,5); // 15

