<?php
namespace ArrayUtil\Stats;

function min($array)
{
  $minValue = $array[0];

  for ($flag = 1; $flag < sizeof($array); $flag++) {
    if ($minValue > $array[$flag])
      $minValue = $array[$flag];
  }

  return "Minimum: $minValue";
}

