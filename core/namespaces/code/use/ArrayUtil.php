<?php

namespace ArrayUtil\Arithmetic;

function array_sum($array): float
{
  $sum = 0;
  foreach ($array as $value) {
    $sum += $value;
  }
  return $sum;
}

namespace ArrayUtil\Stats;

function min($array): float
{
  $minValue = $array[0];

  for ($flag = 1; $flag < sizeof($array); $flag++) {
    if ($minValue > $array[$flag])
      $minValue = $array[$flag];
  }

  return $minValue;
}

namespace ArrayUtil;

use function \ArrayUtil\Arithmetic\array_sum as a_sum;
use function \ArrayUtil\Stats\min;

var_dump(a_sum([1, 2, 3, 4])); //=> float(10)
var_dump(min([1, 2, 3, 4])); //=> float(1)
