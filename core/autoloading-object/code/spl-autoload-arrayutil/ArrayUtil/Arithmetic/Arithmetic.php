<?php
namespace ArrayUtil\Arithmetic;

trait Arithmetic
{
  public static function sum($array): float
  {
    $sum = 0;
    foreach ($array as $value) {
      $sum += $value;
    }
    return $sum;
  }
}
