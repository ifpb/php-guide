<?php
namespace ArrayUtil;

function min($array)
{
  $minValue = $array[0];

  for ($flag = 1; $flag < sizeof($array); $flag++) {
    if ($minValue > $array[$flag])
      $minValue = $array[$flag];
  }

  return "Minimum: $minValue";
}

// Unqualified name
var_dump(min([1, 4, 2, 6, 10, 3])); //=> string(10) "Minimum: 1"

// Qualified name
var_dump(ArrayUtil\min([1, 4, 2, 6, 10, 3])); //=> 1
//=> Fatal error: Uncaught Error: Call to undefined function ArrayUtil\ArrayUtil\min()

// Fully qualified name
// Global space
var_dump(\min([1, 4, 2, 6, 10, 3])); //=> int(1)
// ArrayUtil space
var_dump(\ArrayUtil\min([1, 4, 2, 6, 10, 3])); //=> string(10) "Minimum: 1"
