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

// Unqualified name

var_dump(array_sum([1, 2, 3, 4])); //=> int(10)

// Qualified name
var_dump(Arithmetic\array_sum([1, 2, 3, 4])); //=> float(10)

// Fully qualified name
var_dump(\array_sum([1, 2, 3, 4])); //=> int(10)
var_dump(\ArrayUtil\Arithmetic\array_sum([1, 2, 3, 4])); //=> float(10)
