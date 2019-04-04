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

use function \ArrayUtil\Stats\min;
use function \ArrayUtil\Arithmetic\array_sum as a_sum;

$a = [1, 2, 3, 4];

var_dump(\min($a));                 //=> int(1)
var_dump(\ArrayUtil\Stats\min($a)); //=> float(1)
var_dump(Stats\min($a));            //=> float(1)
var_dump(min($a));                  //=> float(1)

var_dump(\array_sum($a));                      //=> int(10)
var_dump(\ArrayUtil\Arithmetic\array_sum($a)); //=> float(10)
var_dump(Arithmetic\array_sum($a));            //=> float(10)
var_dump(array_sum($a));                       //=> int(10)
var_dump(a_sum($a));                           //=> float(10)
