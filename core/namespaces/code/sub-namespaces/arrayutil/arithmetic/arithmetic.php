<?php
namespace ArrayUtil\Arithmetic;

function array_sum($array)
{
  $sum = 0;
  foreach ($array as $value) {
    $sum += $value;
  }
  return "Sum: $sum";
}
